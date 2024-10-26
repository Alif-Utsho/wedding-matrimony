<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="loginForm">
                    @csrf
                    <div class="form-group">
                        <label for="loginEmail">Email</label>
                        <input type="email" class="form-control" id="loginEmail" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="loginPassword">Password</label>
                        <input type="password" class="form-control" id="loginPassword" name="password" required>
                    </div>
                    <p class="float-end my-auto">Not a member? <a href="{{ route('user.register') }}" class="text-primary">Sign up now</a></p>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="rememberMe" name="remember">
                        <label class="form-check-label" for="rememberMe">Remember Me</label>
                    </div>
                    <div class="alert alert-danger d-none" id="loginError"></div>
                    <button type="submit" class="btn btn-primary" id="loginSubmit">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('script')

<script>

$(document).ready(function() {
    $('#loginForm').on('submit', function(e) {
        e.preventDefault();

        var $form = $(this);
        var $submitButton = $('#loginSubmit');
        var $errorDiv = $('#loginError');

        $submitButton.prop('disabled', true).text('Logging in...');

        $.ajax({
            url: "{{ route('user.loginSubmit') }}",
            method: 'POST',
            data: $form.serialize(),
            success: function(response) {
                window.location.reload();
            },
            error: function(xhr) {
                $submitButton.prop('disabled', false).text('Login');
                
                var errors = xhr.responseJSON.errors;
                if (errors.email) {
                    $errorDiv.text(errors.email[0]).removeClass('d-none');
                } else if (errors.password) {
                    $errorDiv.text(errors.password[0]).removeClass('d-none');
                } else {
                    $errorDiv.text('Invalid credentials, please try again.').removeClass('d-none');
                }
            }
        });
    });
});


</script>
    
@endpush