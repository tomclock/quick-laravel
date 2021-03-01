@if($random < 50)
<p>{{$random}}は50未満です。</p>
@elseif($random < 70)
<p>{{$random}}は50以上,70未満です。</p>
@else
<p>{{$random}}は70以上です。</p>
@endif

@unless($random === 50)
<p>{{$random}}は50ではありません。</p>
@endunless

@empty($random)
@else
<p>変数randomは{{$random}}です。</p>
@endempty

@switch((int)($random/10))
    @case(1)
        <p> 10 <= random < 20</p>
        @break
    @case(2)
        <p> 20 <= random < 30</p>
        @break
    @case(3)
        <p> 30 <= random < 40</p>
        @break
    @case(4)
        <p> 40 <= random < 50</p>
        @break
    @case(5)
        <p> 50 <= random < 60</p>
        @break
    @case(6)
        <p> 60 <= random < 70</p>
        @break
    @case(7)
        <p> 70 <= random < 80</p>
        @break
    @case(8)
        <p> 80 <= random < 90</p>
        @break
    @case(9)
        <p> 90 <= random < 100</p>
        @break
    @default
        <p> else {{$random/10}} </p>
@endswitch

@php
    $i=0;
@endphp

@while($i<6)
    @php
        $i++;
    @endphp
    <h{{$i}}>{{$i}}番目です。</h{{$i}}>
@endwhile

@for($j=6;$j>0;$j--)
    <h{{$j}}>{{$j}}番目です。
    </h{{$j}}>
@endfor