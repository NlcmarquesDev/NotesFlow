<div class="d-flex justify-content-between mt-3 ">
    <form class="my-auto" role="search">
        <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
    </form>
    <div class="nav col-12 col-lg-auto  justify-content-center align-items-center gap-4  text-small">
        <a href="/" class="d-flex align-items-center  text-black text-decoration-none logo-user fs-3">
            <?= $_SESSION['user'] ? $_SESSION['user']['email'][0] : '' ?>
        </a>
        <a href="#" class="text-black  text-decoration-none">
            <div class="d-flex flex-column justify-content-center align-items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                </svg>

                <span>New Note</span>
            </div>
        </a>

    </div>