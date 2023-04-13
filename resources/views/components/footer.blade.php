<div>
     <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">

      <div class="copyright">
        <div id="counter-area"> <span id="counter"></span> visitors </div>
        <script>
            function r(t,r){return Math.floor(Math.random()*(r-t+1)+t)}var interval=2e3,variation=5,c=r(10000,2e3);$("#counter").text(c),setInterval(function(){var t=r(-variation,variation);c+=t,$("#counter").text(c)},interval);
        </script>

        &copy; Copyright <strong>Anira Chemicals Pvt. Ltd.</strong>. All Rights Reserved
      </div>
      <div class="credits">

        Developed by <a href="https://sortieservices.com/">SSPL</a>
      </div>
      @if (Request::is('/'))
        <div class="credits">
            <a href="https://sg2plcpnl0075.prod.sin2.secureserver.net:2096/cpsess7529939806/webmail/paper_lantern/index.html" target="_blank">Webmail</a>
        </div>
      @endif

    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <a class="whatsapp jd-flex align-items-center justify-content-center" href="https://api.whatsapp.com/send?phone=+919990696316&text=Helo%21%20Anira%20Chemicals" target="_blank">
    <img src="{{ asset('assets/img/whats.png')}}" style="height:40px;" > </span>
</a>


<script>
    function random(min,max)
    {
        return Math.floor(Math.random()*(max-min+1)+min);
    }

    var initial = random(10000, 2000);
    var count = initial;

    setInterval(function() {
    var variation = random(-5,5);

    count += variation
    console.log('You currently have ' + count + ' visitors')

    }, 2000)
</script>


</div>
