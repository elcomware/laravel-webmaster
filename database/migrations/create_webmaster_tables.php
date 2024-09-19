<?php

use Elcomwares\WebMaster\Enums\WebSite\FooterDesign;
use Elcomwares\WebMaster\Enums\WebSite\HeaderDesign;
use Elcomwares\WebMaster\Enums\WebSite\MenuType;
use Elcomwares\WebMaster\Enums\WebSite\PageDesign;
use Elcomwares\WebMaster\Enums\WebSite\SectionFields;
use Elcomwares\WebMaster\Enums\WebSite\SectionType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {

        Schema::create('webmaster_custom_settings', function (Blueprint $table) {
            $table->id();

            $table->string('key');
            $table->text('value');

            $table->foreignId('created_by')->nullable()
                ->constrained()->cascadeOnDelete();
            $table->foreignId('last_edited_by')->nullable()
                ->constrained()->cascadeOnDelete();
            $table->unsignedTinyInteger('version')->default(1);
            $table->timestamps();
        });

        Schema::create('webmaster_mail_settings', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active')->default(false);
            $table->string('driver', length: 50);
            $table->string('host');
            $table->string('port', length: 50);
            $table->string('username', length: 100);
            $table->string('password');
            $table->string('encryption');
            $table->string('from_address');
            $table->string('from_name');
            $table->string('title', length: 100)->nullable();
            $table->longText('template')->nullable();

            $table->foreignId('created_by')->nullable()
                ->constrained()->cascadeOnDelete();
            $table->foreignId('last_edited_by')->nullable()
                ->constrained()->cascadeOnDelete();
            $table->unsignedTinyInteger('version')->default(1);
            $table->timestamps();
        });

        Schema::create('webmaster_site_settings', function (Blueprint $table) {
            $table->id();
            $table->json('info_title')->nullable();
            $table->json('info_description')->nullable();
            $table->json('info_keywords')->nullable();
            $table->string('info_url');
            $table->string('info_email');
            $table->string('info_logo')->nullable();
            $table->string('info_favicon')->nullable();

            $table->json('contact_address')->nullable();
            $table->json('contact_workhours')->nullable();
            $table->string('contact_phone1')->nullable();
            $table->string('contact_phone2')->nullable();
            $table->string('contact_phone3')->nullable();
            $table->string('contact_postbox')->nullable();
            $table->string('contact_fax')->nullable();
            $table->string('contact_email')->nullable();

            $table->json('social_links')->nullable(); // all possible social links key-value

            $table->string('style_primary_color')->nullable()->default('#33b5db');
            $table->string('style_secondary_color')->nullable()->default('#2e3e4e');
            $table->string('style_tertiary_color')->nullable()->default('#0cbaa4');
            $table->string('style_font_family')->nullable()->default('Roboto');

            $table->string('style_logo')->nullable();
            $table->string('style_favicon')->nullable();
            $table->string('style_apple')->nullable();

            $table->enum('style_pages_design', PageDesign::getPageDesigns())
                ->default(PageDesign::SinglePage->value);

            $table->enum('style_header_design', HeaderDesign::getHeaders())
                ->default(HeaderDesign::HeaderMovable->value);
            $table->enum('style_footer_design', FooterDesign::getFooters())
                ->default(FooterDesign::FooterStyle1->value);

            $table->boolean('style_bg_type')->default(false);
            $table->string('style_bg_pattern')->nullable();
            $table->string('style_bg_color')->nullable();
            $table->string('style_bg_image')->nullable();

            $table->boolean('style_subscribe')->default(false);

            $table->string('style_footer_bg')->nullable();
            $table->boolean('style_preload')->default(false);
            $table->longText('css')->nullable();

            $table->string('notify_email');
            $table->boolean('notify_messages_status')->default(false);
            $table->boolean('notify_comments_status')->default(false);
            $table->boolean('notify_orders_status')->default(false);
            $table->boolean('notify_table_status')->default(false);
            $table->boolean('notify_private_status')->default(false);

            $table->boolean('under_maintenance')->default(false);
            $table->boolean('is_active')->default(true);
            $table->text('close_msg')->nullable();

            $table->foreignId('created_by')->nullable()
                ->constrained()->cascadeOnDelete();
            $table->foreignId('last_edited_by')->nullable()
                ->constrained()->cascadeOnDelete();
            $table->unsignedTinyInteger('version')->default(1);
            $table->timestamps();
        });

        Schema::create('webmaster_site_menus', function (Blueprint $table) {
            $table->id();
            $table->integer('row_no');
            $table->foreignId('parent_id')->nullable();
            $table->json('title')->nullable();
            $table->boolean('is_active')->default(true);
            $table->enum('link_type', MenuType::getSitMenus())
                ->default(MenuType::MainMenu->value);

            $table->integer('cat_id')->nullable();
            $table->string('link_url')->nullable();

            $table->foreignId('created_by')->nullable()
                ->constrained()->cascadeOnDelete();
            $table->foreignId('last_edited_by')->nullable()
                ->constrained()->cascadeOnDelete();
            $table->unsignedTinyInteger('version')->default(1);
            $table->timestamps();
        });

        Schema::create('webmaster_sections', function (Blueprint $table) {
            $table->id();
            $table->integer('row_no');
            $table->json('title')->nullable();

            $table->enum('type', SectionType::getWebsiteSections())
                ->default(SectionType::General->value);

            $table->boolean('title_status')->default(true);
            $table->boolean('photo_status')->default(true);
            $table->boolean('case_status')->default(true);
            $table->boolean('visits_status')->default(true);
            $table->boolean('sections_status')->default(false);
            $table->boolean('comments_status')->default(false);
            $table->boolean('date_status')->default(false);
            $table->boolean('expire_date_status')->default(false);
            $table->boolean('longtext_status')->default(false);
            $table->boolean('editor_status')->default(false);
            $table->boolean('attach_file_status')->default(false);
            $table->boolean('extra_attach_file_status')->default(false);
            $table->boolean('multi_images_status')->default(false);
            $table->boolean('section_icon_status')->default(false);
            $table->boolean('icon_status')->default(false);
            $table->boolean('maps_status')->default(false);
            $table->boolean('order_status')->default(false);
            $table->boolean('related_status')->default(false);
            $table->boolean('status')->default(false);
            $table->json('seo_title')->nullable();
            $table->json('seo_description')->nullable();
            $table->json('seo_keywords')->nullable();
            $table->string('seo_url_slug')->nullable();

            $table->foreignId('created_by')->nullable()
                ->constrained()->cascadeOnDelete();
            $table->foreignId('last_edited_by')->nullable()
                ->constrained()->cascadeOnDelete();
            $table->unsignedTinyInteger('version')->default(1);
            $table->timestamps();
        });

        Schema::create('webmaster_section_fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_id')->constrained('webmaster_sections');

            $table->enum('field_type', SectionFields::getSectionFields())->nullable();
            $table->json('title')->nullable(); //in all supported languages
            $table->string('default_value')->nullable();
            $table->json('details')->nullable(); //in all supported languag
            $table->unsignedInteger('row_no');
            $table->unsignedTinyInteger('status');
            $table->unsignedTinyInteger('required');
            $table->unsignedTinyInteger('in_table')->default(0);
            $table->unsignedTinyInteger('in_search')->default(0);
            $table->unsignedTinyInteger('in_listing')->default(0);
            $table->unsignedTinyInteger('in_page')->default(0);
            $table->unsignedTinyInteger('in_statics')->default(0);
            $table->string('lang_code')->nullable();
            $table->string('css_class')->nullable();
            $table->string('view_permission_groups')->nullable();
            $table->string('add_permission_groups')->nullable();
            $table->string('edit_permission_groups')->nullable();

            $table->foreignId('created_by')->nullable()
                ->constrained()->cascadeOnDelete();
            $table->foreignId('last_edited_by')->nullable()
                ->constrained()->cascadeOnDelete();
            $table->unsignedTinyInteger('version')->default(1);
            $table->timestamps();
        });

        Schema::create('webmaster_topic_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable()
                ->constrained('webmaster_topic_categories');
            $table->json('name');
            $table->string('topic_id');

            $table->foreignId('created_by')->nullable()
                ->constrained()->cascadeOnDelete();
            $table->foreignId('last_edited_by')->nullable()
                ->constrained()->cascadeOnDelete();
            $table->unsignedTinyInteger('version')->default(1);
            $table->timestamps();
        });

        Schema::create('webmaster_topics', function (Blueprint $table) {
            $table->id();

            $table->integer('webmaster_id');
            $table->foreignId('section_id')
                ->constrained('webmaster_sections');
            $table->foreignId('section_fields_id')
                ->constrained('webmaster_section_fields');

            $table->foreignId('topic_category_id')
                ->constrained('webmaster_topic_categories');

            $table->json('title')->nullable();
            $table->json('details')->nullable();

            $table->date('date')->nullable();
            $table->date('expire_date')->nullable();
            $table->tinyInteger('video_type')->nullable();
            $table->string('photo_file')->nullable();
            $table->string('attach_file')->nullable();
            $table->text('video_file')->nullable();
            $table->string('audio_file')->nullable();

            $table->tinyInteger('status');
            $table->integer('visits');

            $table->integer('row_no');

            $table->string('photo')->nullable();
            $table->string('icon')->nullable();
            $table->unsignedTinyInteger('is_active');
            $table->unsignedInteger('visits');
            $table->unsignedInteger('parent_id');
            $table->unsignedInteger('row_no');

            $table->json('seo_title')->nullable();
            $table->json('seo_description')->nullable();
            $table->json('seo_keywords')->nullable();
            $table->json('seo_url_slug')->nullable();

            $table->foreignId('created_by')->nullable()
                ->constrained()->cascadeOnDelete();
            $table->foreignId('last_edited_by')->nullable()
                ->constrained()->cascadeOnDelete();
            $table->unsignedTinyInteger('version')->default(1);
            $table->timestamps();
        });

        Schema::create('webmaster_seo_settings', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active')->default(false);
            $table->string('meta_title');
            $table->text('meta_description');
            $table->string('meta_keywords');
            $table->string('canonical_url')->nullable();
            $table->string('robots_txt')->nullable();

            $table->foreignId('created_by')->nullable()
                ->constrained()->cascadeOnDelete();
            $table->foreignId('last_edited_by')->nullable()
                ->constrained()->cascadeOnDelete();
            $table->unsignedTinyInteger('version')->default(1);
            $table->timestamps();
        });

        Schema::create('webmaster_analytics_settings', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active')->default(false);
            $table->string('google_analytics_id')->nullable();
            $table->string('facebook_pixel_id')->nullable();
            $table->string('hotjar_id')->nullable();

            $table->foreignId('created_by')->nullable()
                ->constrained()->cascadeOnDelete();
            $table->foreignId('last_edited_by')->nullable()
                ->constrained()->cascadeOnDelete();
            $table->unsignedTinyInteger('version')->default(1);
            $table->timestamps();
        });

        Schema::create('webmaster_locale_settings', function (Blueprint $table) {
            $table->id();
            $table->string('code', length: 10);
            $table->string('name', length: 100);
            $table->string('direction', length: 10)->nullable();
            $table->string('left', length: 10)->nullable();
            $table->string('right', length: 10)->nullable();
            $table->string('icon', length: 50)->nullable();
            $table->tinyInteger('box_status')->default(true)->nullable();
            $table->tinyInteger('is_active')->default(true)->nullable();
            $table->string('currency_code', length: 10)->nullable();
            $table->string('currency_name', length: 100)->nullable();

            $table->boolean('is_default')->default(false);

            $table->foreignId('created_by')->nullable()
                ->constrained()->cascadeOnDelete();
            $table->foreignId('last_edited_by')->nullable()
                ->constrained()->cascadeOnDelete();
            $table->unsignedTinyInteger('version')->default(1);
            $table->timestamps();
        });

    }

    public function down(): void
    {

        Schema::dropIfExists('webmaster_section_fields');
        Schema::dropIfExists('webmaster_custom_settings');
        Schema::dropIfExists('webmaster_locale_settings');
        Schema::dropIfExists('webmaster_themes_settings');
        Schema::dropIfExists('webmaster_analytics_settings');
        Schema::dropIfExists('webmaster_seo_settings');
        Schema::dropIfExists('webmaster_site_settings');
    }
};
