<?php

namespace Okipa\LaravelBootstrapComponents\Tests\Unit\Clickable;

use Okipa\LaravelBootstrapComponents\Clickable\Button;
use Okipa\LaravelBootstrapComponents\Test\BootstrapComponentsTestCase;
use Okipa\LaravelBootstrapComponents\Test\Fakers\RoutesFaker;

class ButtonBackTest extends BootstrapComponentsTestCase
{
    use RoutesFaker;

    public function testConfigStructure()
    {
        // components
        $this->assertTrue(array_key_exists('button_back', config('bootstrap-components')));
        // components.button_back
        $this->assertTrue(array_key_exists('view', config('bootstrap-components.button_back')));
        $this->assertTrue(array_key_exists('icon', config('bootstrap-components.button_back')));
        $this->assertTrue(array_key_exists('label', config('bootstrap-components.button_back')));
        $this->assertTrue(array_key_exists('class', config('bootstrap-components.button_back')));
        $this->assertTrue(array_key_exists('html_attributes', config('bootstrap-components.button_back')));
        // components.button_back.class
        $this->assertTrue(array_key_exists('container', config('bootstrap-components.button_back.class')));
        $this->assertTrue(array_key_exists('component', config('bootstrap-components.button_back.class')));
        // components.button_back.html_attributes
        $this->assertTrue(array_key_exists('container', config('bootstrap-components.button_back.html_attributes')));
        $this->assertTrue(array_key_exists('component', config('bootstrap-components.button_back.html_attributes')));
    }

    public function testExtendsInput()
    {
        $this->assertEquals(Button::class, get_parent_class(buttonBack()));
    }

    public function testNoType()
    {
        $html = buttonBack()->toHtml();
        $this->assertContains('<div class="button-container', $html);
        $this->assertContains('<a href="http://localhost"', $html);
        $this->assertContains('class="button-component', $html);
    }

    public function testSetButtonType()
    {
        $html = buttonBack()->type('submit')->toHtml();
        $this->assertContains('<div class="button-container', $html);
        $this->assertContains('<a href="http://localhost"', $html);
        $this->assertContains('class="button-component', $html);
    }

    public function testSetUrl()
    {
        $customUrl = 'test-custom-url';
        $html = buttonBack()->url($customUrl)->toHtml();
        $this->assertContains('<a href="' . $customUrl . '"', $html);
    }

    public function testSetRoute()
    {
        $this->setRoutes();
        $customRoute = 'users.index';
        $html = buttonBack()->route($customRoute)->toHtml();
        $this->assertContains('<a href="' . route($customRoute) . '"', $html);
    }

    public function testConfigIcon()
    {
        $configIcon = 'test-config-icon';
        config()->set('bootstrap-components.button_back.icon', $configIcon);
        $html = buttonBack()->toHtml();
        $this->assertContains($configIcon, $html);
    }

    public function testSetIcon()
    {
        $configIcon = 'test-config-icon';
        $customIcon = 'test-custom-icon';
        config()->set('bootstrap-components.button_back.icon', $configIcon);
        $html = buttonBack()->icon($customIcon)->toHtml();
        $this->assertContains('<span class="icon">' . $customIcon . '</span>', $html);
        $this->assertNotContains('<span class="icon">' . $configIcon . '</span>', $html);
    }

    public function testNoIcon()
    {
        config()->set('bootstrap-components.button_back.icon', null);
        $html = buttonBack()->toHtml();
        $this->assertNotContains('<span class="icon">', $html);
    }

    public function testHideIcon()
    {
        $configIcon = 'test-config-icon';
        config()->set('bootstrap-components.button_back.icon', $configIcon);
        $html = buttonBack()->hideIcon()->toHtml();
        $this->assertNotContains('<span class="icon">' . $configIcon . '</span>', $html);
    }

    public function testConfigLabel()
    {
        $configLabel = 'test-config-label';
        config()->set('bootstrap-components.button_back.label', $configLabel);
        $html = buttonBack()->toHtml();
        $this->assertContains('title="bootstrap-components::' . $configLabel . '">', $html);
        $this->assertContains('<span class="label">bootstrap-components::' . $configLabel . '</span>', $html);
    }

    public function testSetLabel()
    {
        $label = 'test-custom-label';
        $html = buttonBack()->label($label)->toHtml();
        $this->assertContains('<span class="label">' . $label . '</span>', $html);
    }

    public function testNoLabel()
    {
        config()->set('bootstrap-components.button_back.label', null);
        $html = buttonBack()->toHtml();
        $this->assertNotContains('<span class="label">', $html);
        $this->assertNotContains('title="', $html);
        $this->assertNotContains('<span class="label">', $html);
    }

    public function testHideLabel()
    {
        $configLabel = 'test-config-label';
        config()->set('bootstrap-components.button_back.label', $configLabel);
        $html = buttonBack()->hideLabel()->toHtml();
        $this->assertNotContains('title="bootstrap-components::' . $configLabel . '">', $html);
        $this->assertNotContains('<span class="label">bootstrap-components::' . $configLabel . '</span>', $html);
    }

    public function testConfigContainerClass()
    {
        $configContainerCLass = 'test-config-class-container';
        config()->set('bootstrap-components.button_back.class.container', [$configContainerCLass]);
        $html = buttonBack()->toHtml();
        $this->assertContains('<div class="button-container ' . $configContainerCLass . '">', $html);
    }

    public function testSetContainerClass()
    {
        $configContainerCLass = 'test-config-class-container';
        $customContainerCLass = 'test-custom-class-container';
        config()->set('bootstrap-components.input.class.container', [$configContainerCLass]);
        $html = buttonBack()->containerClass([$customContainerCLass])->toHtml();
        $this->assertContains('<div class="button-container ' . $customContainerCLass . '">', $html);
        $this->assertNotContains('<div class="button-container ' . $configContainerCLass . '">', $html);
    }

    public function testConfigComponentClass()
    {
        $configComponentCLass = 'test-config-class-component';
        config()->set('bootstrap-components.button_back.class.component', [$configComponentCLass]);
        $html = buttonBack()->toHtml();
        $this->assertContains('class="button-component ' . $configComponentCLass . '"', $html);
    }

    public function testSetComponentClass()
    {
        $configComponentCLass = 'test-config-class-component';
        $customComponentCLass = 'test-custom-class-component';
        config()->set('bootstrap-components.button_back.class.component', [$customComponentCLass]);
        $html = buttonBack()->componentClass([$customComponentCLass])->toHtml();
        $this->assertContains('class="button-component ' . $customComponentCLass . '"', $html);
        $this->assertNotContains('class="button-component ' . $configComponentCLass . '"', $html);
    }

    public function testConfigContainerHtmlAttributes()
    {
        $configContainerAttributes = 'test-config-attributes-container';
        config()->set('bootstrap-components.button_back.html_attributes.container', [$configContainerAttributes]);
        $html = buttonBack()->toHtml();
        $this->assertContains($configContainerAttributes, $html);
    }

    public function testSetContainerHtmlAttributes()
    {
        $configContainerAttributes = 'test-config-attributes-container';
        $customContainerAttributes = 'test-custom-attributes-container';
        config()->set('bootstrap-components.button_back.html_attributes.container', [$configContainerAttributes]);
        $html = buttonBack()->containerHtmlAttributes([$customContainerAttributes])->toHtml();
        $this->assertContains($customContainerAttributes, $html);
        $this->assertNotContains($configContainerAttributes, $html);
    }

    public function testConfigComponentHtmlAttributes()
    {
        $configComponentAttributes = 'test-config-attributes-component';
        config()->set('bootstrap-components.button_back.html_attributes.component', [$configComponentAttributes]);
        $html = buttonBack()->toHtml();
        $this->assertContains($configComponentAttributes, $html);
    }

    public function testSetComponentHtmlAttributes()
    {
        $configComponentAttributes = 'test-config-attributes-component';
        $customComponentAttributes = 'test-custom-attributes-component';
        config()->set('bootstrap-components.button_back.html_attributes.component', [$configComponentAttributes]);
        $html = buttonBack()->componentHtmlAttributes([$customComponentAttributes])->toHtml();
        $this->assertContains($customComponentAttributes, $html);
        $this->assertNotContains($configComponentAttributes, $html);
    }
}