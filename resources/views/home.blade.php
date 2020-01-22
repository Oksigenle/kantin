<style>
    #watch {
        color: rgb(150, 252, 235);
        /* position: fixed; */
        /* z-index: 1; */
        /* height: 1.4em; */
        /* width: 3.8em; */
        /* overflow: show; */
        margin: auto;
        font-size: 10vw;
        -webkit-text-stroke: 3px rgb(215, 65, 36);
        text-shadow: 4px 4px 10px rgba(215, 65, 36, 0.4),
                    4px 4px 20px rgba(215, 45, 26, 0.4),
                    4px 4px 30px rgba(215, 25, 16, 0.4),
                    4px 4px 40px rgba(215, 15, 06, 0.4);
    }
</style>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <!-- <div class="card-header">Dashboard</div> -->

                <div class="card-body" align="center">
                    <h1 id="in"> <b> KANTIN KEJUJURAN</b> </h1>
                    <div align="center"  id="watch"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        function clock() {
          var now = new Date();
          var secs = ('0' + now.getSeconds()).slice(-2);
          var mins = ('0' + now.getMinutes()).slice(-2);
          var hr = now.getHours();
          var Time = hr + ":" + mins + ":" + secs;
          document.getElementById("watch").innerHTML = Time;
          requestAnimationFrame(clock);
        }

        requestAnimationFrame(clock);
    });
</script>