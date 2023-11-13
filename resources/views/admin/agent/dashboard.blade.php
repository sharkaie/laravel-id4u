@extends('admin.app')

@section('page-title', 'Dashboard')

@section('main-content')

      <!--Begin::Dashboard 1-->
      <!--Begin::Row-->
      

      <!--Begin::Row-->
      <div class="row">
          

          <div class="col-xl-4 col-lg-4 order-lg-2 order-xl-1">
              <!--begin:: Widgets/Daily Sales-->
              <div class="kt-portlet kt-portlet--height-fluid">
                  <div class="kt-widget14">
                      <div class="kt-widget14__header kt-margin-b-30">
                          <h3 class="kt-widget14__title">
                              Accurate Tracking
                          </h3>
                          <span class="kt-widget14__desc">
    Monitor the entries Easily
  </span>
                      </div>
                      <div class="kt-widget14__chart" style="height:120px;">
                          <canvas id="kt_chart_daily_sales"></canvas>
                      </div>
                  </div>
              </div>
              <!--end:: Widgets/Daily Sales-->
          </div>
          <div class="col-xl-4 col-lg-4 order-lg-2 order-xl-1">
              <!--begin:: Widgets/Profit Share-->
              <div class="kt-portlet kt-portlet--height-fluid">
                  <div class="kt-widget14">
                      <div class="kt-widget14__header">
                          <h3 class="kt-widget14__title">
                              Better tools
                          </h3>
                          <span class="kt-widget14__desc">
Fast Easy interface
  </span>
                      </div>
                      <div class="kt-widget14__content">
                          <div class="kt-widget14__chart">
                              <div class="kt-widget14__stat">Fast</div>
                              <canvas id="kt_chart_profit_share" style="height: 140px; width: 140px;"></canvas>
                          </div>
                          <div class="kt-widget14__legends">
                              <div class="kt-widget14__legend">
                                  <span class="kt-widget14__bullet kt-bg-success"></span>
                                  <span class="kt-widget14__stats">Mass Entries</span>
                              </div>
                              <div class="kt-widget14__legend">
                                  <span class="kt-widget14__bullet kt-bg-warning"></span>
                                  <span class="kt-widget14__stats">Best cropper</span>
                              </div>
                              <div class="kt-widget14__legend">
                                  <span class="kt-widget14__bullet kt-bg-brand"></span>
                                  <span class="kt-widget14__stats">One click download</span>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <!--end:: Widgets/Profit Share-->
          </div>
          <div class="col-xl-4 col-lg-4 order-lg-2 order-xl-1">
              <!--begin:: Widgets/Revenue Change-->
              <div class="kt-portlet kt-portlet--height-fluid">
                  <div class="kt-widget14">
                      <div class="kt-widget14__header">
                          <h3 class="kt-widget14__title">
                              Easy to use
                          </h3>
                          <span class="kt-widget14__desc">
  Neat and clean Digital Forms
  </span>
                      </div>
                      <div class="kt-widget14__content">
                          <div class="kt-widget14__chart">
                              <div class="kt-widget14__stat">Fast</div>
                              <canvas id="kt_chart_profit_share" style="height: 140px; width: 140px;"></canvas>
                          </div>
                          <div class="kt-widget14__legends">
                              <div class="kt-widget14__legend">
                                  <span class="kt-widget14__bullet kt-bg-success"></span>
                                  <span class="kt-widget14__stats">Customised Forms</span>
                              </div>
                              <div class="kt-widget14__legend">
                                  <span class="kt-widget14__bullet kt-bg-warning"></span>
                                  <span class="kt-widget14__stats">Unlimited Entries</span>
                              </div>
                              <div class="kt-widget14__legend">
                                  <span class="kt-widget14__bullet kt-bg-brand"></span>
                                  <span class="kt-widget14__stats">Preview before exit</span>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <!--end:: Widgets/Revenue Change-->
          </div>
              </div>
              <!--end:: Widgets/Support Tickets -->
          </div>
      </div> 
      <!--End::Row-->
      <!--End::Dashboard 1-->

@endsection

@section('page-scripts')
<script src="{{asset('admin/assets/js/demo1/pages/dashboard.js')}}" type="text/javascript"></script>
@endsection
