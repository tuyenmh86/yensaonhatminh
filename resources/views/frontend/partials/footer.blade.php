

@section('style')
@endsection

<footer id="footer" class="footer-1">
   <div class="footer-copyright">
      <div class="container">
         <div class="row">
            <div class="col-md-12 text-center">
               <p>Copyright {{\App\GeneralSetting::first()->address}} © @php use Carbon\Carbon @endphp {{Carbon::now()->year}}. All rights reserved.</p>
            </div>
         </div>
      </div>
   </div>
</footer>

