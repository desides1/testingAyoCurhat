@extends('layouts.app')

@section('title', $title)

@section('content')

@role('Admin')
<div class="row mx-1 my-1">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body chat-page p-0">
                <div class="chat-data-block">
                    <div class="row">
                        <div class="col-lg-3 chat-data-left">
                            <div class="chat-search pt-3 pl-3 rtl-pr-3">
                                <div class="chat-searchbar mt-4">
                                    <div class="form-group chat-search-data m-0">
                                        <input type="text" class="form-control round" id="chat-search"
                                            placeholder="Cari">
                                        <i class="ri-search-line"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="chat-sidebar-channel scroller mt-4 pl-3 rtl-pr-3">
                                <!-- <h5 class="">Public Channels</h5> -->
                                <ul class="iq-chat-ui nav flex-column nav-pills">
                                    @foreach ($users as $user)
                                    <li>
                                        <a data-toggle="pill" href="#chatbox{{ $user->id }}">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar mx-2 rtl-ml-2 rtl-mr-0">
                                                    <img src="{{ asset('assets/images/pages/user.png') }}"
                                                        alt="chatuserimage" class="avatar-50">
                                                </div>
                                                <div class="chat-sidebar-name">
                                                    <h6 class="mb-0 mr-3 rtl-mr-0">{{ $user->name }}</h6>
                                                    <span>{{ ucfirst($user->user_status) }}</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-9 chat-data p-0 chat-data-right">
                            <div class="tab-content h-100">
                                <div class="tab-pane fade active show h-100" id="default-block" role="tabpanel">
                                    <div class="chat-start">
                                        <span class="iq-start-icon text-primary"><i class="ri-message-line"></i></span>
                                    </div>
                                </div>
                                @foreach ($users as $user)
                                <div class="tab-pane fade" id="chatbox{{ $user->id }}" role="tabpanel">
                                    <div class="chat-head">
                                        <header
                                            class="d-flex justify-content-between align-items-center bg-white pt-3 pr-3 pb-3">
                                            <div class="d-flex align-items-center">
                                                <div class="sidebar-toggle">
                                                    <i class="ri-menu-3-line"></i>
                                                </div>
                                                <div class="avatar chat-user-profile mr-2 ml-3 rtl-mr-0 rtl-ml-3">
                                                    <img src="{{ asset('assets/images/pages/user.png') }}"
                                                        alt="avatar" class="avatar-50">
                                                </div>
                                                <h5 class="mb-0 mr-3 rtl-ml-3 rtl-mr-0">{{ $user->name }}</h5>
                                            </div>
                                            <div class="chat-header-icons d-flex">
                                                <span class="dropdown iq-bg-primary">
                                                    <i class="ri-more-2-line cursor-pointer dropdown-toggle nav-hide-arrow cursor-pointer pr-0"
                                                        id="dropdownMenuButton02" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false"
                                                        role="menu"></i>
                                                    <span class="dropdown-menu dropdown-menu-right"
                                                        aria-labelledby="dropdownMenuButton02">
                                                        <a class="dropdown-item" href="JavaScript:void(0);"><i
                                                                class="ri-pushpin-2-line" aria-hidden="true"></i>
                                                            Pin</a>
                                                        <a class="dropdown-item" href="JavaScript:void(0);"><i
                                                                class="ri-inbox-archive-line"
                                                                aria-hidden="true"></i> Arsipkan</a>
                                                    </span>
                                                </span>
                                            </div>
                                        </header>
                                    </div>

                                    <div class="chat-content scroller">
                                        @php
                                        $chats = \App\Models\Counseling::where('sender_id', $user->id)
                                        ->orWhere('receiver_id', $user->id)
                                        ->orderBy('created_at', 'asc')
                                        ->get();
                                        @endphp
                                        @foreach ($chats as $chat)
                                        <div
                                            class="chat {{ $chat->sender_id != auth()->user()->id ? 'chat-left' : '' }}">
                                            <div class="chat-user">
                                                <a class="avatar m-0">
                                                    <img src="{{ asset('assets/images/pages/user.png') }}"
                                                        alt="avatar" class="avatar-35">
                                                </a>
                                                <span class="chat-time mt-1">6:45</span>
                                            </div>
                                            <div class="chat-detail">
                                                <div class="chat-message">
                                                    <p>{{ $chat->message }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="chat-footer p-3 bg-white">
                                        <form class="d-flex align-items-center"
                                            action="{{ route('counselings.send') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="receiver_id" value="{{ $user->id }}">
                                            <input type="text" class="form-control mr-3 rtl-mr-0 rtl-ml-3"
                                                placeholder="Tulis pesan disini" name="message">
                                            <button type="submit"
                                                class="btn btn-primary d-flex align-items-center p-2 mr-3 rtl-mr-0 rtl-ml-3"><i
                                                    class="far fa-paper-plane mr-0" aria-hidden="true"></i><span
                                                    class="d-none d-lg-block ml-1 mr-1">Kirim</span></button>
                                        </form>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endrole

@role('Tamu Satgas')
<div class="row mx-1 my-1">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body chat-page p-0">
                <div class="chat-data-block">
                    <div class="row">
                        <div class="col-lg-12 chat-data p-0 chat-data-right">
                            <div class="tab-content h-100">
                                <div class="tab-pane fade active show" id="chatbox" role="tabpanel">
                                    <div class="chat-head">
                                        <header
                                            class="d-flex justify-content-between align-items-center bg-white pt-3 pr-3 pb-3">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar chat-user-profile ml-3 mr-2 rtl-mr-0 rtl-ml-3">
                                                    <img src="{{ asset('assets/images/pages/logo-satgas.png') }}"
                                                        alt="avatar" class="avatar-50"
                                                        style="width:60px; height:auto">
                                                </div>
                                                <h5 class="mb-0 mr-3 rtl-ml-3 rtl-mr-0">Satgas PPKS</h5>
                                            </div>
                                            {{-- <div class="chat-header-icons d-flex">
                                                        <span class="dropdown iq-bg-primary">
                                                            <i class="ri-more-2-line cursor-pointer dropdown-toggle nav-hide-arrow cursor-pointer pr-0"
                                                                id="dropdownMenuButton02" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false"
                                                                role="menu"></i>
                                                            <span class="dropdown-menu dropdown-menu-right"
                                                                aria-labelledby="dropdownMenuButton02">
                                                                <a class="dropdown-item" href="JavaScript:void(0);"><i
                                                                        class="fa fa-thumb-tack" aria-hidden="true"></i> Pin
                                                                    to top</a>
                                                                <a class="dropdown-item" href="JavaScript:void(0);"><i
                                                                        class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                                    chat</a>
                                                                <a class="dropdown-item" href="JavaScript:void(0);"><i
                                                                        class="fa fa-ban" aria-hidden="true"></i> Block</a>
                                                            </span>
                                                        </span>
                                                    </div> --}}
                                        </header>
                                    </div>

                                    <div class="chat-content scroller">
                                        @foreach ($chats as $chat)
                                        <div
                                            class="chat {{ $chat->sender_id != auth()->user()->id ? 'chat-left' : '' }}">
                                            <div class="chat-user">
                                                <a class="avatar m-0">
                                                    <img src="{{ asset('assets/images/pages/user.png') }}"
                                                        alt="avatar" class="avatar-35">
                                                </a>
                                                <span
                                                    class="chat-time mt-1">{{ date('H:i', strtotime($chat->created_at)) }}</span>
                                            </div>
                                            <div class="chat-detail">
                                                <div class="chat-message">
                                                    <p>{{ $chat->message }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach`
                                    </div>
                                    <div class="chat-footer p-3 bg-white">
                                        <form class="d-flex align-items-center"
                                            action="{{ route('counselings.send') }}" method="POST">
                                            @csrf
                                            <input type="text" class="form-control mr-3 rtl-mr-0 rtl-ml-3"
                                                placeholder="Tulis pesan disini" name="message">
                                            <button type="submit"
                                                class="btn btn-primary d-flex align-items-center p-2 mr-3 rtl-mr-0 rtl-ml-3"><i
                                                    class="far fa-paper-plane mr-0" aria-hidden="true"></i><span
                                                    class="d-none d-lg-block ml-1 mr-1">Kirim</span></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endrole

<script>
    setTimeout(() => {
        window.Echo.channel('messages')
            .listen('CounselingMessages', (e) => {
                console.log(e);
            })
    }, 200);
</script>
@endsection