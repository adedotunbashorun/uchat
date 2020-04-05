<?php

namespace Modules\Core\Sidebar\Presentation\Illuminate;

use Illuminate\Contracts\View\Factory;
use Maatwebsite\Sidebar\Badge;
use Maatwebsite\Sidebar\Presentation\Illuminate\IlluminateBadgeRenderer as PackageBadgeRenderer;

class IlluminateBadgeRenderer extends PackageBadgeRenderer
{
    /**
     * @var Factory
     */
    protected $factory;

    /**
     * @var string
     */
    protected $view = 'core::sidebar.badge';

    /**
     * @param Factory $factory
     */
    public function __construct(Factory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @param Badge $badge
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render(Badge $badge)
    {
        if ($badge->isAuthorized()) {
            return $this->factory->make($this->view, [
                'badge' => $badge
            ])->render();
        }
    }
}
