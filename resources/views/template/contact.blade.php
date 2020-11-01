@extends('template.main')
@section('main')
    <!-- Breadcrumb End -->

    <div class="alice-bg section-padding-bottom">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="contact-block">
              <div class="row">
                <div class="col-lg-4">
                  <div class="contact-address">
                    <h4>Contact Info</h4>
                    <ul>
                      <li><i data-feather="map-pin"></i>International Noel Nawab Street Los Alamitos CA 90720, USA</li>
                      <li><i data-feather="mail"></i>supportjob@gmail.com example@yourmail.com</li>
                      <li><i data-feather="phone-call"></i>+99 06 1234 566 88</li>
                    </ul>
                  </div>
                </div>
                <div class="col-lg-7 offset-lg-1">
                  <div class="contact-form">
                    <h4>Keep In Touch</h4>
                    <form action="#" id="contactForm">
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <input type="text" class="form-control" name="message_title" placeholder="Message title">
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="form-group">
                            <textarea class="form-control" name="message_body" placeholder="Message"></textarea>
                          </div>
                        </div>
                      </div>
                      <button class="button send">Submit</button>
                    </form>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="call-to-action-bg padding-top-90 padding-bottom-90">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="call-to-action-2">
              <div class="call-to-action-content">
                <h2>For Find Your Dream Job or Candidate</h2>
                <p>Add resume or post a job. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec.</p>
              </div>
              <div class="call-to-action-button">
                <a href="add-resume.html" class="button">Add Resume</a>
                <span>Or</span>
                <a href="post-job.html" class="button">Post A Job</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
        $('.send').click(function () {
            var email = $('input[name=email]').val();
            var message_title = $('input[name=message_title]').val();
            var message_body = $('textarea[name=message_body]').val();
            $.ajax({
                url: "{{ route('send') }}",
                type: "POST",
                data: {
                    'email': email,
                    'message_title': message_title,
                    'message_body': message_body,
                    "_token": "{{ csrf_token() }}",
                },
                success: function (response) {
                    alert(response.message)
                    $('input[name=email]').val("");
                    $('input[name=message_title]').val("");
                    $('textarea[name=message_body]').val("");
                },
                error: function (request, error, response) {
                    alert(response.error())
                },
            })
        })
    </script>
@endsection
