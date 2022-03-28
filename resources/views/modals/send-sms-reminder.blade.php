<div class="modal fade" id="sendReminderNotification{{ $tenant->id }}" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('admin.tenants.sendReminder') }}" method="post">
                @csrf
                <input type="hidden" name="tenant_id" value="{{ $tenant->id }}">
                <div class="modal-body">
                    <div aria-labelledby="swal2-title" aria-describedby="swal2-content"
                        class="swal2-popup swal2-modal swal2-show" tabindex="-1" role="dialog" aria-live="assertive"
                        aria-modal="true" style="display: flex;">
                        <div class="swal2-header">
                            <ul class="swal2-progress-steps" style="display: none;">
                            </ul>
                            <div class="swal2-icon swal2-error" style="display: none;">
                            </div>
                            <div class="swal2-icon swal2-question" style="display: none;">
                            </div>
                            <div class="swal2-icon swal2-warning" style="display: none;">
                            </div>
                            <div class="swal2-icon swal2-info" style="display: none;">
                            </div>
                            <div class="swal2-icon swal2-success" style="display: none;">
                            </div><img class="swal2-image" style="display: none;">
                            <h2 class="swal2-title" id="swal2-title" style="display: none;">
                            </h2><button type="button" class="swal2-close" aria-label="Close this dialog"
                                style="display: none;">×</button>
                        </div>
                        <div class="swal2-content">
                            <div id="swal2-content" class="swal2-html-container" style="display: block;">
                                <div class="card-head">
                                    <small class="text-uppercase">
                                        <i class="fa fa-bell"></i>
                                        &nbsp;
                                        &nbsp;Send
                                        Reminders</small>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 p-t-20">
                                        <div class="mdl-textfield mdl-js-textfield txt-full-width is-upgraded is-dirty"
                                            data-upgraded="MaterialTextfield">
                                            <textarea name="message" class="mdl-textfield__input" rows="4" id="msg-input" style="outline: none !important;"
                                                placeholder="Compose Message:"
                                                spellcheck="false">Hi {{ $tenant->name }}, your rent is now overdue, please make payments to avoid being disconnected.  </textarea>
                                            <label class="mdl-textfield__label text-info" for="msg-input">Compose
                                                Message:</label>
                                            <small class="float-left">
                                                SMS:
                                                <a href="{{ $tenant->phone }}">{{ $tenant->phone }}</a>
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                Mail-to:
                                                <a href="{{ $tenant->email }}">{{ $tenant->email }}</a>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div><input class="swal2-input" style="display: none;"><input type="file"
                                class="swal2-file" style="display: none;">
                            <div class="swal2-range" style="display: none;">
                                <input type="range"><output></output>
                            </div><select class="swal2-select" style="display: none;"></select>
                            <div class="swal2-radio" style="display: none;">
                            </div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input
                                    type="checkbox"><span class="swal2-label"></span></label>
                            <textarea class="swal2-textarea" style="display: none;"></textarea>
                            <div class="swal2-validation-message" id="swal2-validation-message">
                            </div>
                        </div>
                        <div class="swal2-actions">
                            <button type="submit" class="swal2-confirm swal2-styled" aria-label="Save Changes"
                                style="display: inline-block; background-color: rgb(48, 133, 214); border-left-color: rgb(48, 133, 214); border-right-color: rgb(48, 133, 214);"><i
                                    class="fa fa-send fa-rotate-90"></i>
                                Send message
                            </button><button type="button" class="swal2-cancel swal2-styled" aria-label="Cancel"
                                onclick="window.location=''"
                                style="display: inline-block; background-color: rgb(221, 51, 51);"><i
                                    class="fa fa-times-circle"></i>
                                Cancel</button>
                        </div>
                        <div class="swal2-footer" style="display: none;">
                        </div>
                        <div class="swal2-timer-progress-bar-container">
                            <div class="swal2-timer-progress-bar" style="display: none;">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
