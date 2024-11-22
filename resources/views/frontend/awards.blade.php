@extends('layouts.frontend')
@section('demo')
current current-menu-ancestor current-menu-parent
@endsection
@section('body')


<section class="page-title" style="background-image: url({{asset('frontend/uploads/2021/10/pattern-16.png')}})">
   <div class="pattern-layer-one"
      style="background-image: url({{asset('frontend/themes/moko/assets/images/main-slider/pattern-1.png')}})"></div>
   <div class="pattern-layer-two"
      style="background-image: url({{asset('frontend/themes/moko/assets/images/background/pattern-17.png')}})"></div>
   <div class="pattern-layer-three"
      style="background-image: url({{asset('frontend/themes/moko/assets/images/background/pattern-18.png')}})"></div>
   <div class="pattern-layer-four"
      style="background-image: url({{asset('frontend/themes/moko/assets/images/icons/cross-icon.png')}})"></div>
   <div class="auto-container">
      <h2> Awards</h2>
      <ul class="page-breadcrumb">
         <li><a href="../index.html">Home</a></li>
         <li>Awards</li>
      </ul>
   </div>
</section>
<!-- End Page Title Section -->
<div data-elementor-type="wp-page" data-elementor-id="723" class="elementor elementor-723">
   <section
      class="elementor-section elementor-top-section elementor-element elementor-element-8bda09d elementor-section-full_width elementor-section-height-default elementor-section-height-default"
      data-id="8bda09d" data-element_type="section">
      <div class="elementor-container elementor-column-gap-default">
         <div
            class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-5e38bf0"
            data-id="5e38bf0" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
               <div
                  class="elementor-element elementor-element-a7ab0c7 elementor-widget elementor-widget-moko_blog_with_sidebar"
                  data-id="a7ab0c7" data-element_type="widget" data-widget_type="moko_blog_with_sidebar.default">
                  <div class="elementor-widget-container">

                     <!-- Sidebar Page Container -->
                     <div class="sidebar-page-container">
                        <div class="auto-container">
                           <div class="row clearfix">
 
                                 @foreach ($awards as $award)
                                    <div class="news-block col-lg-4 col-md-6 col-sm-12">
                                       <div class="inner-box wow fadeInLeft" data-wow-delay="0ms"
                                          data-wow-duration="1500ms">
                                          <div class="image">
                                             <img fetchpriority="high" decoding="async" width="370"
                                                style="height: 270px" src="{{asset($award->img)}}"
                                                class="attachment-moko_370x250 size-moko_370x250 wp-post-image"
                                                alt="" />
                                          </div>
                                          <div class="lower-content">

                                             <h5><a href="javascript:void(0)">{{$award->headline}}</a></h5>
                                             <p>{{$award->description}}</p>
                                          </div>
                                       </div>
                                    </div>
                                 @endforeach


                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>

                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>

<div class="clearfix"></div>



</section>


@endsection