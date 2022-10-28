<div class="popupcontainer" id="{{$domId}}">
    <div class="w-screen max-w-[21rem] mt-4 bg-[#242424] rounded-[10px]">
        <div class="p-3">
            <p id="close" class="w-fit cursor-pointer close">x</p>
        </div>
        <div class="max-h-[84vh] overflow-y-auto p-5">
            {{$slot}}
        </div>
    </div>
</div>