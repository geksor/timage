<?php
namespace frontend\widgets;

use common\models\CallbackSection;
use yii\base\Widget;

/**
 * Class ModalConsultWidget
 * @package frontend\widgets
 *
 * @property string $sectionName
 */
class ModalSectionWidget extends Widget
{
    public $sectionName;

    public function run()
    {
        $model = new CallbackSection();
        $model->section_name = $this->sectionName?$this->sectionName:'';

        return $this->render('modalSection-widget', [
            'model' => $model,
        ]);
    }
}