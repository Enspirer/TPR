<?php

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push(__('strings.backend.dashboard.title'), route('admin.dashboard'));
});

require __DIR__.'/auth.php';
require __DIR__.'/log-viewer.php';

Breadcrumbs::for('admin.country.index', function ($trail) {
    $trail->push('Country', route('admin.country.index'));
});

Breadcrumbs::for('admin.country.create', function ($trail) {
    $trail->push('Create', route('admin.country.create'));
});

Breadcrumbs::for('admin.country.edit', function ($trail) {
    $trail->push('Edit', route('admin.country.edit',1));
});

Breadcrumbs::for('admin.country.features', function ($trail) {
    $trail->push('Features', route('admin.country.features', 1));
});

Breadcrumbs::for('admin.property.index', function ($trail) {
    $trail->push('Property Request (Country Manager Approved)', route('admin.property.index'));
});

Breadcrumbs::for('admin.property.edit', function ($trail) {
    $trail->push('Approval', route('admin.property.edit',1));
});

Breadcrumbs::for('admin.property_type.index', function ($trail) {
    $trail->push('Property Type', route('admin.property_type.index'));
});

Breadcrumbs::for('admin.property_type.create', function ($trail) {
    $trail->push('Create', route('admin.property_type.create'));
});

Breadcrumbs::for('admin.property_type.edit', function ($trail) {
    $trail->push('Approval', route('admin.property_type.edit',1));
});

Breadcrumbs::for('admin.agent.index', function ($trail) {
    $trail->push('Agent Request (Country Manager Approved)', route('admin.agent.index'));
});
Breadcrumbs::for('admin.agent.edit', function ($trail) {
    $trail->push('Approval', route('admin.agent.edit',1));
});

Breadcrumbs::for('admin.contact_us.index', function ($trail) {
    $trail->push('Contact Us', route('admin.contact_us.index'));
});

Breadcrumbs::for('admin.contact_us.edit', function ($trail) {
    $trail->push('Edit Contact Us', route('admin.contact_us.edit',1));
});

Breadcrumbs::for('admin.file_manager.index', function ($trail) {
    $trail->push('File Manager', route('admin.file_manager.index'));
});

Breadcrumbs::for('admin.global_advertisement.index', function ($trail) {
    $trail->push('Global Advertisement', route('admin.global_advertisement.index'));
});

Breadcrumbs::for('admin.global_advertisement.create', function ($trail) {
    $trail->push('Global Advertisement', route('admin.global_advertisement.create'));
});

Breadcrumbs::for('admin.global_advertisement.edit', function ($trail) {
    $trail->push('Edit Global Advertisement', route('admin.global_advertisement.edit',1));
});

Breadcrumbs::for('admin.ad_category.index', function ($trail) {
    $trail->push('Ad Category', route('admin.ad_category.index'));
});

Breadcrumbs::for('admin.homepage_advertisement.index', function ($trail) {
    $trail->push('Home Page Advertisement', route('admin.homepage_advertisement.index'));
});

Breadcrumbs::for('admin.homepage_advertisement.edit', function ($trail) {
    $trail->push('Edit Home Page Advertisement', route('admin.homepage_advertisement.edit',1));
});

Breadcrumbs::for('admin.sidebar_advertisement.index', function ($trail) {
    $trail->push('Sidebar Advertisement', route('admin.sidebar_advertisement.index'));
});

Breadcrumbs::for('admin.sidebar_advertisement.edit', function ($trail) {
    $trail->push('Edit Sidebar Advertisement', route('admin.sidebar_advertisement.edit',1));
});

Breadcrumbs::for('admin.settings.index', function ($trail) {
    $trail->push('Settings', route('admin.settings.index'));
});

Breadcrumbs::for('admin.settings.edit', function ($trail) {
    $trail->push('Edit Settings', route('admin.settings.edit',1));
});



Breadcrumbs::for('admin.about_us', function ($trail) {
    $trail->push('About Us', route('admin.about_us'));
});
Breadcrumbs::for('admin.privacy_policy', function ($trail) {
    $trail->push('Privacy policy', route('admin.privacy_policy'));
});
Breadcrumbs::for('admin.terms_of_use', function ($trail) {
    $trail->push('Terms of Use', route('admin.terms_of_use'));
});



