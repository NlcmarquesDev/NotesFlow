<div class="d-flex justify-content-between mt-3 ">
    <div class="d-flex gap-2">
        <form action="/notes_app_php/search" class="my-auto d-flex gap-2" role="search" method="POST">
            <input type="search" class="form-control" name="search" placeholder="Search..." aria-label="Search">
            <button class="btn btn-outline-primary">search</button>
        </form>
        <a href="/notes_app_php/notes" class="btn btn-outline-primary">All Notes</a>
    </div>

    <button type="button" class="btn btn-outline-dark border-0 text-center p-2  " data-bs-toggle="modal" data-bs-target="#exampleModal">
        <div class="d-flex justify-content-center align-items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
            </svg>
            <span>New Note</span>
        </div>
    </button>
</div>