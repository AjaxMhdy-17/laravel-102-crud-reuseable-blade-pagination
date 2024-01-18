@include("header")

<div class="px-8 py-16">
    <h1 class="text-3xl">
        This is example page 
    </h1>
   <div class="text-4xl">
        my name is {{$name}} and  @isset($post)  i'm a {{$post}}  @endisset 
   </div>
   <div class="my-4">
    <div>This is our conditional block</div>
    <div class="text-3xl my-3">
     
     @if($id == 1)
         <div>this is id number {{$id}}</div>
     @elseif($id == 11)
         <div>this is id number {{$id}}</div>
     @else
         <div>This is a random {{$id}}</div>
     @endif
    </div>
    <div class="text-3xl my-3">
        @unless($id == 1)
            <div>The id number is not equal to 1</div>
        @endunless 
    </div>
   </div>

   <div class="my-4">
    <div class="my-2">This is our loop block</div>
        @for($i = 1 ; $i <= 10 ; $i++)
            <div>
                @if($i % 2 == 1)
                    This is odd for loop number {{$i}}
                @endif 
            </div>
        @endfor 
   </div>

   <div class="my-4">
    <div class="my-2">This is our foreach loop block</div>
        single element with index number {{$students[0]}}
        <div class="my-2">
            @foreach($students as $single_student)
                <div class="bg-indigo-800 px-4 py-1">{{$single_student}}</div>
            @endforeach
        </div>
   </div>

   <div class="my-4">
    <div class="my-2">This is our while block</div>
        <!-- {{$i = 1}} -->
        @while($i <= 5 )
            <div>this is while loop number : {{$i++}}</div>
        @endwhile
   </div>

</div>
@include("footer")