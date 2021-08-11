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

Breadcrumbs::for('admin.settings.index', function ($trail) {
    $trail->push('Settings', route('admin.settings.index'));
});

