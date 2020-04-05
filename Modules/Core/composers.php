<?php

view()->creator('core::admin._sidebar', \Modules\Core\Composers\SidebarViewCreator::class);
view()->creator('core::public._account-sidebar', \Modules\Core\Composers\SidebarPublicViewCreator::class);
view()->composer('*', \Modules\Core\Composers\MasterViewComposer::class);
view()->composer('layouts.master', \Modules\Core\Composers\CurrentUserViewComposer::class);
