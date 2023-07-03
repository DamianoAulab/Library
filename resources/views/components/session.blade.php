@if (session('success')) 
    <div id="sessionSuccess" class="justify-content-center" style="display: flex;">
        <div class="text-center bg-success bg-opacity-25 rounded text-success mb-4 px-4 py-2 fs-4 fw-semibold">{{session('success')}}</div> 
    </div>
@elseif (session('edit'))
    <div id="sessionEdit" class="justify-content-center" style="display: flex;">
        <div class="text-center bg-warning bg-opacity-25 rounded text-warning mb-4 px-4 py-2 fs-4 fw-semibold">{{session('edit')}}</div> 
    </div>
@elseif (session('delete'))
    <div id="sessionDelete" class="justify-content-center" style="display: flex;">
        <div class="text-center bg-danger bg-opacity-25 rounded text-danger mb-4 px-4 py-2 fs-4 fw-semibold">{{session('delete')}}</div> 
    </div>
@endif