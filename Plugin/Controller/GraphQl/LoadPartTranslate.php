<?php
/**
 * @category  Ebolution
 * @package   Ebolution/GraphQlTranslation
 * @author    Manuel GARCÍA <manuel.garcia@ebolution.com>
 * @license   MIT License
 */
namespace Ebolution\GraphQlTranslation\Plugin\Controller\GraphQl;

use Magento\Framework\App\Area;
use Magento\Framework\App\AreaList;
use Magento\Framework\App\State;
use Magento\Framework\Exception\LocalizedException;
use Magento\GraphQl\Controller\GraphQl;

class LoadPartTranslate
{
    /** @var AreaList $areaList */
    private $areaList;

    /** @var State $appState */
    private $appState;

    /**
     * @param AreaList $areaList
     * @param State $appState
     */
    public function __construct(
        AreaList $areaList,
        State $appState
    ) {
        $this->areaList = $areaList;
        $this->appState = $appState;
    }

    /**
     * @param GraphQl $subject
     * @throws LocalizedException
     */
    public function beforeDispatch(GraphQl $subject)
    {
        $area = $this->areaList->getArea($this->appState->getAreaCode());
        $area->load(Area::PART_TRANSLATE);
    }
}
