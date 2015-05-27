<?php
namespace valiant\widget;

use yii\web\AssetBundle;

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
	public $sourcePath = '@valiant/assets';
	public $js = [
		'valiant.phone.js',
	];

	public $depends = [
		'yii\web\YiiAsset',
	];
}