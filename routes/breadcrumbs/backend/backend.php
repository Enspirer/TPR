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

Breadcrumbs::for('admin.fpur.index', function ($trail) {
    $trail->push('Featured Property Update Request', route('admin.fpur.index'));
});

Breadcrumbs::for('admin.fpur.edit', function ($trail) {
    $trail->push('Approval', route('admin.fpur.edit',1));
});

Breadcrumbs::for('admin.property.index', function ($trail) {
    $trail->push('Property Request (Country Manager Approved)', route('admin.property.index'));
});

Breadcrumbs::for('admin.property.edit', function ($trail) {
    $trail->push('Approval', route('admin.property.edit',1));
});

Breadcrumbs::for('admin.sold_properties.index', function ($trail) {
    $trail->push('Sold Properties Request', route('admin.sold_properties.index'));
});
Breadcrumbs::for('admin.sold_properties.edit', function ($trail) {
    $trail->push('Approval', route('admin.sold_properties.edit',1));
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


Breadcrumbs::for('admin.global_ad_categories.index', function ($trail) {
    $trail->push('Global Ad Categories', route('admin.global_ad_categories.index'));
});

Breadcrumbs::for('admin.global_ad_categories.create', function ($trail) {
    $trail->push('Global Ad Categories / Create', route('admin.global_ad_categories.create'));
});

Breadcrumbs::for('admin.global_ad_categories.edit', function ($trail) {
    $trail->push('Global Ad Categories / Edit', route('admin.global_ad_categories.edit',1));
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

Breadcrumbs::for('admin.landing_page', function ($trail) {
    $trail->push('Landing Page', route('admin.landing_page'));
});

Breadcrumbs::for('admin.property_parameter.index', function ($trail) {
    $trail->push('Property Type Parameter', route('admin.property_parameter.index'));
});
Breadcrumbs::for('admin.property_parameter.edit', function ($trail) {
    $trail->push('Status Property Type Parameter', route('admin.property_parameter.edit',1));
});


Breadcrumbs::for('admin.about_us', function ($trail) {
    $trail->push('About Us', route('admin.about_us'));
});
Breadcrumbs::for('admin.privacy_policy', function ($trail) {
    $trail->push('Privacy policy', route('admin.privacy_policy'));
});
Breadcrumbs::for('admin.cookie_policy', function ($trail) {
    $trail->push('Cookie policy', route('admin.cookie_policy'));
});
Breadcrumbs::for('admin.terms_of_use', function ($trail) {
    $trail->push('Terms of Use', route('admin.terms_of_use'));
});
Breadcrumbs::for('admin.tips_for_buyers', function ($trail) {
    $trail->push('Tips for buyers', route('admin.tips_for_buyers'));
});
Breadcrumbs::for('admin.tips_for_sellers', function ($trail) {
    $trail->push('Tips for sellers', route('admin.tips_for_sellers'));
});
Breadcrumbs::for('admin.commercial_resources', function ($trail) {
    $trail->push('Commercial Resources', route('admin.commercial_resources'));
});

Breadcrumbs::for('admin.pro_cal.index', function ($trail) {
    $trail->push('Property Calculator', route('admin.pro_cal.index'));
});

Breadcrumbs::for('admin.blog_category.index', function ($trail) {
    $trail->push('Category', route('admin.blog_category.index'));
});
Breadcrumbs::for('admin.blog_category.create', function ($trail) {
    $trail->push('Create Category', route('admin.blog_category.create'));
});
Breadcrumbs::for('admin.blog_category.show', function ($trail) {
    $trail->push('Edit Category', route('admin.blog_category.show',1));
});

Breadcrumbs::for('admin.blog_post.index', function ($trail) {
    $trail->push('Post', route('admin.blog_post.index'));
});
Breadcrumbs::for('admin.blog_post.create', function ($trail) {
    $trail->push('Create Post', route('admin.blog_post.create'));
});
Breadcrumbs::for('admin.blog_post.show', function ($trail) {
    $trail->push('Edit Post', route('admin.blog_post.show',1));
});
