<?php
namespace valiant\widgets;

use yii\web\AssetBundle;
use Yii;

/**
 * Class PhoneAsset
 * This asset bundle provides the css/js files needed for the [[Phone]] widget.
 *
 * @package valiant\widget
 *
 * @author ValianT <mr.igor.prokofev@gmail.com>
 * @since 1.0
 */
class PhoneAsset extends AssetBundle
{
	public $js = [
		'valiant.phone.js',
	];

	public $depends = [
		'yii\web\YiiAsset',
	];

	public function init()
	{
		$this->sourcePath = __DIR__ . '/assets';

		parent::init();
	}


}