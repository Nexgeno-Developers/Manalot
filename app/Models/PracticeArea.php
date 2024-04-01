<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PracticeArea extends Model
{
    use HasFactory;
    
    protected $table = 'practice_areas';

    protected $fillable = [
        'parent_id',
        'thumnail_image',
        'alt_thumnail_image',
        'section_image',
        'alt_section_image',
        'title',
        'short_description',
        'slug',
        'content',
        'focus_area',
        'why_choose_us',
        'faq',
        'meta_title',
        'meta_description',
        'breadcrumb_title',
        'breadcrumb_subtitle',
        'breadcrumb_image',
        'indian_price',
        'foreign_price',
        'progress_bar_title',
        'progress_bar',
        'Content_title',
        'Content_list_title',
        'Content_list',
        'other_content',
        'Section_title_el',
        'eligibility_title',
        'eligibility_sub_title',
        'eligibility_list',
        'eligibility_content',
        'Section_title_doc',
        'doc_title',
        'doc_list',
        'doc_content',
        'Section_title_pro',
        'process_content',
        'process_list_title',
        'process_list',
        'other_content_pro',
        'Section_title_comp',
        'compliances_content',
        'compliances',
        'other_content_comp',
        'Section_title_asst',
        'assistance_content',
        'status',
        'series',
        'is_home',
    ];    
}
