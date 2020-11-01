@extends('template.main')
@section('main')
    <div class="alice-bg section-padding-bottom">
      <div class="container no-gliters">
        <div class="row no-gliters">
          <div class="col">
            <div class="post-container">
              <div class="post-content-wrapper">
                <form action="#" class="job-post-form">
                  <div class="basic-info-input">
                    <h4><i data-feather="plus-circle"></i>Post A Job</h4>
                    <div id="company-name" class="form-group row">
                      <label class="col-md-3 col-form-label">company name</label>
                      <div class="col-md-9">
                        <input type="text" class="form-control" name="company_name" placeholder="Your job title here">
                      </div>
                    </div>
                    <div id="complaint-title" class="form-group row">
                      <label class="col-md-3 col-form-label">complaint Title</label>
                      <div class="col-md-9">
                        <input type="text" class="form-control" name="complaint_title" placeholder="Your job title here">
                      </div>
                    </div>
                    <div id="job-description" class="row">
                      <label class="col-md-3 col-form-label">complaint Description</label>
                      <div class="col-md-9">
                        <textarea id="mytextarea" name="complaint_body"  style="width: 100%;height: 20vh" placeholder="Description text here"></textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-md-3 col-form-label"></label>
                      <div class="col-md-9">
                        <button class="button send">Post Your Job</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Call to Action -->
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

            var company_name = $('input[name=company_name]').val();
            var complaint_title = $('input[name=complaint_title]').val();
            var complaint_body = $('textarea[name=complaint_body]').val();
            console.log(company_name,complaint_body,complaint_title)
            $.ajax({
                type: "POST",
                url: '{{ route('write.post') }}',
                data: {
                    'company_name': company_name,
                    'complaint_title': complaint_title,
                    'complaint_body': complaint_body,
                    "_token": "{{ csrf_token() }}",
                },
                success: function (response) {
                    alert(response.message)
                    $('input[name=company_name]').val("");
                    $('input[name=complaint_title]').val("");
                    $('textarea[name=complaint_body]').val("");
                },
                error: function (request, error, response) {
                    alert(response.error())
                },
            })
        })
    </script>
  @endsection
