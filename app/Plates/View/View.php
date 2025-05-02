<?php

namespace App\Plates\View;

class View
{
    public $layout = null;

    public $layoutData = null;

    public static function configure()
    {
        return new static();
    }

    public function layout(string $layout, array $data = []): self
    {
        $this->layout = $layout;
        $this->layoutData = $data;

        return $this;
    }

    public function renderWithLayout($viewContent): string
    {
        $layoutDirectory = app()->basePath() . '/resources/views/layouts/';

        $layoutPath = $layoutDirectory . $this->layout . '.php';

        if (!file_exists($layoutPath)) {
            throw new \Exception("Layout not found: {$layoutPath}");
        }

        $data = $this->layoutData;

        /**
         * Extract the data array to variables
         */
        if (!empty($data)) {
            extract($data);
        }

        $slot = rand();
        /**
         * Return string of the layout view with the data passed to it
         */
        ob_start();
        include $layoutPath;
        $contents = ob_get_clean();

        $contents = str_replace($slot, $viewContent, $contents);

        return $contents;
    }

    public function renderComponent(string $component, array $data = []): string
    {
        $componentDirectory = app()->basePath() . '/resources/views/';

        $componentPath = $componentDirectory . $component . '.php';

        if (!file_exists($componentPath)) {
            throw new \Exception("Component not found: {$componentPath}");
        }


        /**
         * Extract the data array to variables
         */
        if (!empty($data)) {
            extract($data);
        }

        /**
         * Return string of the component view with the data passed to it
         */
        ob_start();
        include $componentPath;
        $output = ob_get_clean();

        /**
         * If the layout is set, replace the {{ $slot }} with the component output
         */
        if ($this->layout) {
            return $this->renderWithLayout($output);
        }

        return $output;
    }
}
