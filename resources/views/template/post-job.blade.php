@extends('template.main')
@section('main')
    <div class="alice-bg section-padding-bottom">
      <div class="container no-gliters">
        <div class="row no-gliters">
          <div class="col">
            <div class="post-container">
              <div class="post-content-wrapper">
                <div action="#" class="job-post-form">
                  <div class="basic-info-input"><br><br><br>  
                    <div id="company-name" class="form-group row">
                      <label class="col-md-3 col-form-label">Şirkətin adı</label>
                      <div class="col-md-9">
                        <input type="text" class="form-control" name="company_name" placeholder="Şirkətin adı">
                      </div>
                    </div>
                    <div id="complaint-title" class="form-group row">
                      <label class="col-md-3 col-form-label">Şikayətiniz başlığı</label>
                      <div class="col-md-9">
                        <input type="text" class="form-control" name="complaint_title" placeholder="Şikayətiniz başlığı">
                      </div>
                    </div>
                    <div id="job-description" class="row">
                      <label class="col-md-3 col-form-label">Şikayətiniz</label>
                      <div class="col-md-9">
                        <textarea id="mytextarea" name="complaint_body"  style="width: 100%;height: 20vh" placeholder="ŞikayətinizS"></textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-md-3 col-form-label"></label>
                      <div class="col-md-9">
                        <button class="button send">Göndər</button>
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

    <!-- Call to Action -->
   <div class="call-to-action-bg padding-top-90 padding-bottom-90">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="call-to-action-2">
                        <div class="call-to-action-content">
                            <h2>Hər hansısa şirkətdən məhsul almağı<br> planlaşdırırsan?</h2>
                            <span style="font-size: 18px;">Şikayətlər bölməsinə keçid et və həmin şirkət haqqında fikirləri öyrən</span>
                        </div>
                        <div class="call-to-action-button">
                            <a href="{{ route('site.complaints') }}" class="button">Şikayətlər</a>
                            <span>və ya</span>
                            <a href="{{ route('write.complaint') }}" class="button">Şikayət Yaz</a>
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
