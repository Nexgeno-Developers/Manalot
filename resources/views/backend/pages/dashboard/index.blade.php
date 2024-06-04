@extends('backend.layouts.app')

@section('page.name', 'Dashboard')

@section('page.content')
<div class="col-12">
   <div class="card widget-inline">
      <div class="card-body p-0">
         <div class="row g-0">
            <div class="col">
               <div class="card rounded-0 shadow-none m-0">
                  <div class="card-body text-center">
                  <i class="ri-user-unfollow-line font-24"></i>
                     <!-- <i class="ri-suitcase-line text-muted font-24"></i> -->
                     <h3><span>{{$notApprovedCount}}</span> <i class="mdi mdi-arrow-down text-danger"></i></h3>
                     <p class="text-muted font-15 mb-0">Not Approved User</p>
                  </div>
               </div>
            </div>
            <div class="col">
               <div class="card rounded-0 shadow-none m-0 border-start border-light">
                  <div class="card-body text-center">
                  <i class="ri-user-follow-line font-24"></i>
                     <!-- <i class="ri-article-line text-muted font-24"></i> -->
                     <h3><span>{{$approvedCount}}</span> <i class="mdi mdi-arrow-up text-success"></i></h3>
                     <p class="text-muted font-15 mb-0">Approved User</p>
                  </div>
               </div>
            </div>     
         </div>
         <!-- end row -->
      </div>
   </div>
   <!-- end card-box-->
</div>
@endsection