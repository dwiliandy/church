  <footer class="text-center text-lg-start text-white" style="background-color: #552075">
    <div class="container">
      <div class="row py-3">
        <div class="col-md-6 justify-content-center align-self-center">
          <a class="navbar-brand" id="logo" href="#">
            <img  src="{{ asset('images') }}/sinodegmim.png" alt="" style="max-height: 80px">
          </a>
        </div>
        <div class="col-md-6 text-end  justify-content-center align-self-center">
          <a class="text-muted" href="{{  URL::to('https://www.facebook.com/youthsionsentrum')  }}" target="_blank"><img width="40" height="40" src="{{ asset('images') }}/logo/fb.png" alt=""></a>
          <a class="text-muted" href="{{  URL::to('https://www.facebook.com/youthsionsentrum')  }}" target="_blank"><img width="40" height="40" src="{{ asset('images') }}/logo/ig.png" alt=""></a>
          <a class="text-muted" href="{{  URL::to('https://www.facebook.com/youthsionsentrum')  }}" target="_blank"><img width="40" height="40" src="{{ asset('images') }}/logo/wa.png" alt=""></a>
        </div>
      </div>
    </div>
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)" >
      © 2022-{{ now()->year }} Copyright <a class="text-white" href="/">
        Dwiliandi Omega</a>
    </div>
    <!-- Copyright -->
  </footer>