@php
$blog = DB::table('blogs')->where('status', 1)->whereJsonContains('blog_category_ids','3')->limit(4)->orderBy('created_at', 'desc')->get();
//->toArray();
//$right_news = DB::table('blogs')->where('status', 1)->whereJsonContains('blog_category_ids','4')->limit(4)->orderBy('created_at', 'desc')->get();
@endphp
@if(count($blog) > 1)
<!-------============= blog ================---------------------->
<section class="blogs">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <h3 class="color_heading text-center mb-2"data-aos="fade-up" data-aos-once="true">
                BLOGS
             </h3>
             <h1 class="main_heading text-center mb-4"data-aos="fade-up" data-aos-once="true">
                Insights from our experts on various subjects
             </h1>
          </div>
       </div>
       <div class="row">
        
            @foreach ($blog as $row)

            <div class="col-lg-3 col-6 mb-lg-0 mb-3">
                <div class="blog_box">
                    <div class="blog_img_container"data-aos="fade-up" data-aos-once="true">
                    <img
                        src="{{ asset('storage/' .$row->main_image) }}"
                        alt="Blog Image"
                        class="blog_img"
                        />
                    </div>
                    <p class="blog_title"data-aos="fade-up" data-aos-once="true">
                        {{ $row->title }}
                    </p>
                    <a href="{{ url(route('blog.detail', ['category' =>'blog', 'slug' => strtolower(str_replace(' ', '-',$row->slug))] )) }}" class="blog_link"data-aos="fade-up" data-aos-once="true">
                    <span>Learn More </span>
                    <img src="{{ asset('/assets/frontend/images/right.png') }}" alt="" />
                    </a>
                </div>
            </div>
            
            @endforeach

       </div>
    </div>
</section>
@endif

<!----------============== blog =============------------->