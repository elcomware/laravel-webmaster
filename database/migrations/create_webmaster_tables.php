<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {

        Schema::create('webmaster_section_fields', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('webmaster_id');
            $table->unsignedInteger('type');
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
        Schema::create('webmaster_general_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name');
            $table->string('site_url');
            $table->string('site_email');
            $table->string('site_logo')->nullable();
            $table->string('site_favicon')->nullable();
            $table->text('site_description')->nullable();
            $table->boolean('maintenance_mode')->default(false);

            $table->foreignId('created_by')->nullable()
                ->constrained()->cascadeOnDelete();
            $table->foreignId('last_edited_by')->nullable()
                ->constrained()->cascadeOnDelete();
            $table->unsignedTinyInteger('version')->default(1);
            $table->timestamps();
        });

        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->json('site_title')->nullable();
            $table->json('site_description')->nullable();
            $table->json('site_keywords')->nullable();

            $table->string('site_url');
            $table->string('site_email');
            $table->string('site_logo')->nullable();
            $table->string('site_favicon')->nullable();
            $table->boolean('maintenance_mode')->default(false);
            $table->string('site_webmails')->nullable();
            $table->tinyInteger('site_status');

            $table->tinyInteger('notify_messages_status')->nullable();
            $table->tinyInteger('notify_comments_status')->nullable();
            $table->tinyInteger('notify_orders_status')->nullable();
            $table->tinyInteger('notify_table_status')->nullable();
            $table->tinyInteger('notify_private_status')->nullable();

            $table->text('close_msg')->nullable();
            $table->json('social_links')->nullable(); // all possible social links key-value

            $table->string('contact_t1_ar')->nullable();
            $table->string('contact_t1_en')->nullable();
            $table->string('contact_t3')->nullable();
            $table->string('contact_t4')->nullable();
            $table->string('contact_t5')->nullable();
            $table->string('contact_t6')->nullable();
            $table->string('contact_t7_ar')->nullable();
            $table->string('contact_t7_en')->nullable();

            $table->string('style_logo_ar')->nullable();
            $table->string('style_logo_en')->nullable();
            $table->string('style_fav')->nullable();
            $table->string('style_apple')->nullable();
            $table->string('style_color1')->nullable();
            $table->string('style_color2')->nullable();
            $table->tinyInteger('style_type')->nullable();
            $table->tinyInteger('style_bg_type')->nullable();
            $table->string('style_bg_pattern')->nullable();
            $table->string('style_bg_color')->nullable();
            $table->string('style_bg_image')->nullable();
            $table->tinyInteger('style_subscribe')->nullable();
            $table->tinyInteger('style_footer')->nullable();
            $table->tinyInteger('style_header')->nullable();
            $table->string('style_footer_bg')->nullable();
            $table->tinyInteger('style_preload')->nullable();
            $table->longText('css')->nullable();

            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
        });

        Schema::create('webmaster_seo_settings', function (Blueprint $table) {
            $table->id();
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

        Schema::create('webmaster_themes_settings', function (Blueprint $table) {
            $table->id();
            $table->string('theme_name');
            $table->string('primary_color')->nullable();
            $table->string('secondary_color')->nullable();
            $table->string('font_family')->nullable();

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
        Schema::dropIfExists('webmaster_general_settings');
    }
};
