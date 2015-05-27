<?php
namespace valiant\widgets;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;
use Yii;

/**
 * Class PhoneWidget
 * @package valiant\widget
 */
class PhoneWidget extends InputWidget
{

	/**
	 * @var string format phone number, first number - count numbers in code of country, second - code of city.
	 */
	public $format = '13';

	/**
	 * @var boolean whether the label should be HTML-encoded.
	 */
	public $encodeLabel = true;

	/**
	 * @var array the HTML attributes for the input tag.
	 * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
	 */
	public $options = ['class' => 'form-control'];

	/**
	 * Initializes the widget.
	 */
	public function init()
	{
		parent::init();

		if (!isset($this->options['id'])) {
			$this->options['id'] = $this->hasModel() ? Html::getInputId($this->model, $this->attribute) : $this->getId();
		}
	}

	/**
	 * Renders the widget.
	 */
	public function run()
	{
		$this->registerClientScript();

		if ($this->hasModel()) {
			$input = Html::activeTextInput($this->model, $this->attribute, $this->options);
		} else {
			$input = Html::textInput($this->name, $this->value, $this->options);
		}

		return $input;
	}

	/**
	 * Registers the needed JavaScript.
	 */
	public function registerClientScript()
	{
		$options = $this->getClientOptions();
		$options = empty($options) ? '' : Json::htmlEncode($options);
		$view = $this->getView();
		PhoneAsset::register($view);
		$id = $this->options['id'];
		$view->registerJs("jQuery('#$id').valiantPhone($options);");
	}

	/**
	 * Returns the options for the captcha JS widget.
	 * @return array the options
	 */
	protected function getClientOptions()
	{
		$format = array_map('intval', array_slice(str_split($this->format), 0, 2));
		$format[0] = ArrayHelper::getValue($format, 0, 1);
		$format[1] = ArrayHelper::getValue($format, 0, 3);
		$options = [
			'format' => $format,
		];

		return $options;
	}
}