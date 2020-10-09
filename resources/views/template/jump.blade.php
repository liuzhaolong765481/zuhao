@include('tpl._include.header')
<div class="submitState">
    @if($ok)
        <img src="{{asset('images/51.png')}}" alt="">
    @else
        <img src="{{asset('images/52.png')}}" alt="">
    @endif
    <h6>{{$msg}}！</h6>
    <p>系统自动跳转在<em class="time_out"></em>秒后，如果不想等待，<a href="{{url($url)}}">点击这里跳转</a></p>
</div>
<script>
    var timeDesc = 3;

    timeOut();

    function timeOut() {
        $(".time_out").text(" "+timeDesc+" ");
        setTimeout(function () {
            timeDesc --;
            if(timeDesc === 0){
                location.href = "{{url($url)}}"
            }else{
                timeOut();
            }
        },1000)
    }
</script>
@include('tpl._include.footer')
