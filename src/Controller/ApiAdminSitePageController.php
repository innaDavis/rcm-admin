<?php

namespace RcmAdmin\Controller;

use Rcm\Entity\Site;
use Rcm\Http\Response;
use Rcm\View\Model\ApiJsonModel;
use RcmAdmin\Entity\SitePageApiResponse;
use RcmAdmin\InputFilter\SitePageCreateInputFilter;
use RcmAdmin\InputFilter\SitePageUpdateInputFilter;

/**
 * Class ApiAdminSitePageController
 *
 * PHP version 5
 *
 * @category  Reliv
 * @package   RcmAdmin\Controller
 * @author    James Jervis <jjervis@relivinc.com>
 * @copyright 2014 Reliv International
 * @license   License.txt New BSD License
 * @version   Release: <package_version>
 * @link      https://github.com/reliv
 */
class ApiAdminSitePageController extends ApiAdminBaseController
{
    /**
     * isAllowed
     *
     * @param $resourceId
     * @param $privilege
     *
     * @return mixed
     */
    protected function isAllowed($resourceId, $privilege)
    {
        $rcmUserService = $this->getServiceLocator()->get(
            'RcmUser\Service\RcmUserService'
        );

        return $rcmUserService->isAllowed(
            $resourceId,
            $privilege
        );
    }

    /**
     * getSitePagesResourceId
     *
     * @param $siteId
     *
     * @return string
     */
    protected function getSitePagesResourceId($siteId)
    {
        return 'sites.' . $siteId . '.pages';
    }

    /**
     * getPageRepo
     *
     * @return \Rcm\Repository\Page
     */
    protected function getPageRepo()
    {
        return $this->getEntityManager()->getRepository('\Rcm\Entity\Page');
    }

    /**
     * getSiteRepo
     *
     * @return \Rcm\Repository\Site
     */
    protected function getSiteRepo()
    {
        return $this->getEntityManager()->getRepository('\Rcm\Entity\Site');
    }

    /**
     * getSite
     *
     * @param $siteId
     *
     * @return \Rcm\Entity\Site|null
     */
    protected function getSite($siteId)
    {
        try {
            $site = $this->getSiteRepo()->findOneBy(['siteId' => $siteId]);
        } catch (\Exception $e) {
            $site = null;
        }

        return $site;
    }

    /**
     * getSite
     *
     * @param Site $site
     *
     * @return \Rcm\Entity\Page|null
     */
    protected function getPage(Site $site, $pageId)
    {
        return $this->getPageRepo()->getSitePage($site, $pageId);
    }

    /**
     * hasPage
     *
     * @param Site $site
     * @param string $pageName
     * @param string $pageType
     *
     * @return bool
     */
    protected function hasPage(
        $site,
        $pageName,
        $pageType
    ) {
        return $this->getPageRepo()->sitePageExists(
            $site,
            $pageName,
            $pageType
        );
    }

    /**
     * getRequestSiteId
     *
     * @return mixed
     */
    protected function getRequestSiteId()
    {
        $siteId = $this->getEvent()
            ->getRouteMatch()
            ->getParam(
                'siteId',
                'current'
            );

        if ($siteId == 'current') {
            $siteId = $this->getCurrentSite()->getSiteId();
        }

        return (int)$siteId;
    }

    /**
     * getList
     *
     * @return mixed|ApiJsonModel
     */
    public function getList()
    {
        $siteId = $this->getRequestSiteId();

        //ACCESS CHECK
        $sitePagesResource = $this->getSitePagesResourceId($siteId);
        if (!$this->isAllowed('pages', 'read')
            && !$this->isAllowed(
                $sitePagesResource,
                'read'
            )
        ) {
            $this->getResponse()->setStatusCode(Response::STATUS_CODE_401);

            return $this->getResponse();
        }

        $site = $this->getSite($siteId);

        if (empty($site)) {
            return new ApiJsonModel(
                null,
                1,
                "Site was not found with id {$siteId}."
            );
        }

        $pages = $site->getPages();

        foreach ($pages as $key => $value) {
            $apiResponse = new SitePageApiResponse();

            $apiResponse->populate($value->toArray());

            $pages[$key] = $apiResponse;
        }

        return new ApiJsonModel(
            $pages,
            0,
            'Success'
        );
    }

    /**
     * get
     *
     * @param mixed $id
     *
     * @return mixed|ApiJsonModel|\Zend\Stdlib\ResponseInterface
     */
    public function get($id)
    {
        $siteId = $this->getRequestSiteId();

        //ACCESS CHECK
        $sitePagesResource = $this->getSitePagesResourceId($siteId);
        if (!$this->isAllowed('pages', 'read')
            && !$this->isAllowed(
                $sitePagesResource,
                'read'
            )
        ) {
            $this->getResponse()->setStatusCode(Response::STATUS_CODE_401);

            return $this->getResponse();
        }

        $site = $this->getSite($siteId);

        if (empty($site)) {
            return new ApiJsonModel(
                null,
                1,
                "Site was not found with id {$siteId}."
            );
        }

        $page = $this->getPage($site, $id);

        if (empty($page)) {
            return new ApiJsonModel(
                null,
                404,
                "Page was not found with id {$id}."
            );
        }

        $apiResponse = new SitePageApiResponse();

        $apiResponse->populate($page->toArray());

        return new ApiJsonModel($apiResponse, 0, 'Success');
    }

    /**
     * update
     *
     * @todo Needs data prepare for site and exception message needs scrubbed
     *
     * @param mixed $id
     * @param mixed $data
     *
     * @return mixed|ApiJsonModel|\Zend\Stdlib\ResponseInterface
     */
    public function update($id, $data)
    {
        $siteId = $this->getRequestSiteId();

        //ACCESS CHECK
        $sitePagesResource = $this->getSitePagesResourceId($siteId);
        if (!$this->isAllowed('pages', 'edit')
            && !$this->isAllowed(
                $sitePagesResource,
                'edit'
            )
        ) {
            $this->getResponse()->setStatusCode(Response::STATUS_CODE_401);

            return $this->getResponse();
        }

        $inputFilter = new SitePageUpdateInputFilter();

        $inputFilter->setData($data);

        if (!$inputFilter->isValid()) {
            return new ApiJsonModel(
                [],
                1,
                'Some values are missing or invalid for page update.',
                $inputFilter->getMessages()
            );
        }

        $data = $inputFilter->getValues();

        $site = $this->getSite($siteId);

        if (empty($site)) {
            return new ApiJsonModel(
                null,
                1,
                "Site was not found with id {$siteId}."
            );
        }

        $page = $this->getPage($site, $id);

        try {
            $this->getPageRepo()->updatePage(
                $page,
                $data
            );
        } catch (\Exception $e) {
            return new ApiJsonModel(
                null,
                1,
                $e->getMessage()
            );
        }

        $apiResponse = new SitePageApiResponse();

        $apiResponse->populate($page->toArray());

        return new ApiJsonModel($apiResponse, 0, 'Success: Page updated.');
    }

    /**
     * create
     *
     * @param mixed $data
     *
     * @return mixed|ApiJsonModel|\Zend\Stdlib\ResponseInterface
     */
    public function create($data)
    {
        $siteId = $this->getRequestSiteId();

        //ACCESS CHECK
        $sitePagesResource = $this->getSitePagesResourceId($siteId);
        if (!$this->isAllowed('pages', 'create')
            && !$this->isAllowed(
                $sitePagesResource,
                'create'
            )
        ) {
            $this->getResponse()->setStatusCode(Response::STATUS_CODE_401);

            return $this->getResponse();
        }

        $site = $this->getSite($siteId);

        if (empty($site)) {
            return new ApiJsonModel(
                null,
                1,
                "Site was not found with id {$siteId}."
            );
        }

        // // //
        $inputFilter = new SitePageCreateInputFilter();

        $inputFilter->setData($data);

        if (!$inputFilter->isValid()) {
            return new ApiJsonModel(
                [],
                1,
                'Some values are missing or invalid for page creation.',
                $inputFilter->getMessages()
            );
        }

        $data = $inputFilter->getValues();

        if ($this->hasPage($site, $data['name'], $data['pageType'])) {
            return new ApiJsonModel(
                null,
                1,
                'Page already exists, duplicates cannot be created'
            );
        }

        $data['author'] = $this->getCurrentAuthor();

        try {
            $page = $this->getPageRepo()->createPage(
                $site,
                $data
            );
        } catch (\Exception $e) {
            return new ApiJsonModel(
                null,
                1,
                $e->getMessage()
            );
        }

        $apiResponse = new SitePageApiResponse();

        $apiResponse->populate($page->toArray());

        return new ApiJsonModel($apiResponse, 0, 'Success: Page created');
    }

    /**
     * delete
     *
     * @param string $id
     *
     * @return ApiJsonModel
     */
    public function delete($id)
    {
        $id = (int) $id;
        $siteId = $this->getRequestSiteId();

        //ACCESS CHECK
        $sitePagesResource = $this->getSitePagesResourceId($siteId);
        if (!$this->isAllowed('pages', 'delete')
            && !$this->isAllowed(
                $sitePagesResource,
                'delete'
            )
        ) {
            $this->getResponse()->setStatusCode(Response::STATUS_CODE_401);

            return new ApiJsonModel(
                null,
                1,
                "Access denied"
            );
        }

        $site = $this->getSite($siteId);

        if (empty($site)) {
            return new ApiJsonModel(
                null,
                1,
                "Site was not found with id {$siteId}."
            );
        }

        $page = $this->getPage($site, $id);

        if (empty($page)) {
            return new ApiJsonModel(
                null,
                404,
                "Page was not found with id {$id}."
            );
        }

        $pageRepo = $this->getPageRepo();

        $result = $pageRepo->setPageDeleted($page);

        if (!$result) {
            return new ApiJsonModel([$result], 1, 'Page could not be deleted');
        }

        return new ApiJsonModel([$result], 0, 'Page deleted');
    }
}
