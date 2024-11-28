{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h1></h1>
    <div id="jitsi-container" style="height: 600px; width: 100%;"></div>
</div>

<script src="https://8x8.vc/vpaas-magic-cookie-7e3fc4fe64ee4504abdfa1bc52956ad4/external_api.js"></script>
<script>
    const domain = 'meet.jit.si';
    const options = {
        roomName: "{{ $sessionId }}",
        width: '100%',
        height: 600,
        parentNode: document.querySelector('#jitsi-container'),
    };
    const api = new JitsiMeetExternalAPI(domain, options);
</script>
@endsection --}}




{{-- <!DOCTYPE html>
<html>
  <head>
    <script src='https://8x8.vc/vpaas-magic-cookie-7e3fc4fe64ee4504abdfa1bc52956ad4/external_api.js' async></script>
    <style>html, body, #jaas-container { height: 98.6%; }</style>
    <script type="text/javascript">
      window.onload = () => {
        const api = new JitsiMeetExternalAPI("8x8.vc", {
          roomName: "vpaas-magic-cookie-7e3fc4fe64ee4504abdfa1bc52956ad4/{{ $sessionId }}",
          parentNode: document.querySelector('#jaas-container'),
                        // Make sure to include a JWT if you intend to record,
                        // make outbound calls or use any other premium features!
                        // jwt: "eyJraWQiOiJ2cGFhcy1tYWdpYy1jb29raWUtN2UzZmM0ZmU2NGVlNDUwNGFiZGZhMWJjNTI5NTZhZDQvN2QzZDM4LVNBTVBMRV9BUFAiLCJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiJqaXRzaSIsImlzcyI6ImNoYXQiLCJpYXQiOjE3Mjk2NzA0MzksImV4cCI6MTcyOTY3NzYzOSwibmJmIjoxNzI5NjcwNDM0LCJzdWIiOiJ2cGFhcy1tYWdpYy1jb29raWUtN2UzZmM0ZmU2NGVlNDUwNGFiZGZhMWJjNTI5NTZhZDQiLCJjb250ZXh0Ijp7ImZlYXR1cmVzIjp7ImxpdmVzdHJlYW1pbmciOmZhbHNlLCJvdXRib3VuZC1jYWxsIjpmYWxzZSwic2lwLW91dGJvdW5kLWNhbGwiOmZhbHNlLCJ0cmFuc2NyaXB0aW9uIjpmYWxzZSwicmVjb3JkaW5nIjpmYWxzZX0sInVzZXIiOnsiaGlkZGVuLWZyb20tcmVjb3JkZXIiOmZhbHNlLCJtb2RlcmF0b3IiOnRydWUsIm5hbWUiOiJUZXN0IFVzZXIiLCJpZCI6Imdvb2dsZS1vYXV0aDJ8MTA4OTc5Mzg2NTY2NzM5MTgxODg2IiwiYXZhdGFyIjoiIiwiZW1haWwiOiJ0ZXN0LnVzZXJAY29tcGFueS5jb20ifX0sInJvb20iOiIqIn0.LPUSXtT49Wiod7Qxrd-8QDi-t8Dw-EYjMq223VmgU-CnhK-OUKXdPw2Bq9lDbjNhy9Q6Ndjsgy-TLJLA53IphhOCICi22wY50ZX6THJLC56HXKGwx9JTjOQBvhNRZ4NyUSa2PF1FfRser2ChgYXdRE2o79-2BgKWTpr869ajoD2Y5qxutkE4l3F9qJ1sC1f7X6GzTArz1y7XSPaMdv5SpjTGIt7IhiOa0thyEc8wh-l1IutDDVcLBn0fzt6AV5Ra1XceBAhJg01aAQWpRNgx4nJPGXTJw5C0Ol022RAOj8tq-p1GzRM8qfL3gCZvYrsZ6KsCR_XufY3hWfUIq_kBZg"
        });
      }
    </script>
  </head>
  <body><div id="jaas-container" class="py-5 my-4">
</body>
</html>
@extends('layouts.app')
@section('content')
@endsection --}}


{{-- <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://8x8.vc/vpaas-magic-cookie-7e3fc4fe64ee4504abdfa1bc52956ad4/external_api.js" async></script>
    <style>
      html, body, #jaas-container {
        height: 98.6%;
      }
      .file-container {
        margin: 10px;
        padding: 10px;
        border: 1px solid #ccc;
        background: #f9f9f9;
        overflow-y: auto;
        max-height: 200px;
      }
    </style>
<style>
  /* General Style */
  .file-upload-section {
    padding: 30px;
    background: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    max-width: 100%;  /* Full width of the container */
    margin: 0 auto;
    width: 100%;  
    box-sizing: border-box; 
  }

  .upload-title {
    text-align: center;
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
    color: #333;
  }

  /* File Input Section */
  .file-input-container {
    margin-bottom: 20px;
    text-align: center;
  }

  .file-input-label {
    font-size: 16px;
    color: #fff;
    background-color: #4CAF50;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
  }

  .file-input-label:hover {
    background-color: #45a049;
  }

  .file-input {
    display: none;
  }

  /* Upload Button */
  .upload-btn {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;  /* Full width */
    transition: background-color 0.3s;
  }

  .upload-btn:hover {
    background-color: #0056b3;
  }

  /* File List Container */
  .file-container {
    margin-top: 20px;
    padding: 10px;
    border: 1px solid #ccc;
    background: #f1f1f1;
    border-radius: 5px;
    max-height: 200px;
    overflow-y: auto;
  }

  .file-container a {
    color: #007bff;
    text-decoration: none;
    font-size: 16px;
    display: block;
    margin-bottom: 10px;
  }

  .file-container a:hover {
    text-decoration: underline;
  }
</style>
    <script type="text/javascript">
      window.onload = () => {
        // Initialize Jitsi API
        const api = new JitsiMeetExternalAPI("8x8.vc", {
          roomName: "vpaas-magic-cookie-7e3fc4fe64ee4504abdfa1bc52956ad4/{{ $sessionId }}",
          parentNode: document.querySelector('#jaas-container'),
        });

        // Session ID
        const sessionId = "{{ $sessionId }}";

        // Fetch and display files
        async function fetchFiles() {
        const response = await fetch(`/get-files/${sessionId}`);
        const files = await response.json();

        const fileListContainer = document.getElementById("file-list");
        fileListContainer.innerHTML = files.map(file => `
            <div>
                <a href="${file.file_url}" target="_blank">${file.file_name}</a>
            </div>
        `).join('');
        }

        // Select the file upload form
        const fileUploadForm = document.getElementById("file-upload-form");

        // Handle file upload
        fileUploadForm.addEventListener("submit", async (event) => {
          event.preventDefault();

          const formData = new FormData(fileUploadForm);
          formData.append("session_id", sessionId);

          try {
            const response = await fetch("/upload-file", {
              method: "POST",
              body: formData,
            });

            if (response.ok) {
              alert("File uploaded successfully!");
              fetchFiles(); // Refresh file list after upload
            } else {
              const errorData = await response.json();
              console.error("Upload failed:", errorData);
              alert(`File upload failed: ${errorData.message}`);
            }
          } catch (error) {
            console.error("An error occurred:", error);
            alert("File upload failed due to an unexpected error.");
          }
        });

        // Initial fetch and live updates
        fetchFiles();
        setInterval(fetchFiles, 5000); // Refresh file list every 5 seconds
      };
    </script>
  </head>
  <body>
    <!-- Jitsi Meet API -->
    <div id="jaas-container" class="py-5 my-4"></div>

    <!-- File Upload Section -->
<div class="file-upload-section">
  <h3 class="upload-title">File Sharing</h3>

  <!-- File Upload Form -->
  <form id="file-upload-form" enctype="multipart/form-data" class="upload-form">
    @csrf <!-- Include CSRF token -->

    <!-- File Input Field -->
    <div class="file-input-container">
      <label for="file-input" class="file-input-label">
        <i class="fas fa-upload"></i> Choose a file
      </label>
      <input type="file" id="file-input" name="file" required class="file-input" />
    </div>

    <!-- Submit Button -->
    <button type="submit" class="upload-btn">Upload File</button>
  </form>

  <!-- Display Uploaded Files -->
  <div id="file-list" class="file-container">
    <!-- File list will appear here -->
  </div>
</div>


  </body>
</html> --}}





<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <script src="https://8x8.vc/vpaas-magic-cookie-7e3fc4fe64ee4504abdfa1bc52956ad4/external_api.js" async></script>
    <style>
      html, body, #jaas-container {
        height: 98.6%;
      }
      .file-container {
        margin: 10px;
        padding: 10px;
        border: 1px solid #ccc;
        background: #f9f9f9;
        overflow-y: auto;
        max-height: 200px;
      }
    </style>
    <style>
      /* General Style */
      .file-upload-section {
        padding: 30px;
        background: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        max-width: 100%;  /* Full width of the container */
        margin: 0 auto;
        width: 100%;  /* Ensures the container spans the full width */
        box-sizing: border-box; /* Make sure padding doesn't affect width */
      }
    
      .upload-title {
        text-align: center;
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
        color: #333;
      }
    
      /* File Input Section */
      .file-input-container {
      display: flex;
      align-items: center;  /* Vertically center the elements */
      justify-content: flex-start;  /* Align the items to the start of the container */
      margin-bottom: 20px;
      gap: 10px;  /* Adds space between the file input and button */
      }
    
      .file-input-label {
        font-size: 16px;
        color: #fff;
        background-color: #4CAF50;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
      }
    
      .file-input-label:hover {
        background-color: #45a049;
      }
    
      .file-input {
        display: none;
      }
    
      /* Upload Button */
      .upload-btn {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        width: auto; /* Adjust the width to fit content */
      }
    
      .upload-btn:hover {
        background-color: #0056b3;
      }
    
      /* File List Container */
      .file-container {
        margin-top: 20px;
        padding: 10px;
        border: 1px solid #ccc;
        background: #f1f1f1;
        border-radius: 5px;
        max-height: 200px;
        overflow-y: auto;
      }
    
      .file-container a {
        color: #007bff;
        text-decoration: none;
        font-size: 16px;
        display: block;
        margin-bottom: 10px;
      }
    
      .file-container a:hover {
        text-decoration: underline;
      }
    </style>
    <script type="text/javascript">
          window.onload = () => {
            // Initialize Jitsi API
            const api = new JitsiMeetExternalAPI("8x8.vc", {
              roomName: "vpaas-magic-cookie-7e3fc4fe64ee4504abdfa1bc52956ad4/{{ $sessionId }}",
              parentNode: document.querySelector('#jaas-container'),
            });

            // Session ID
            const sessionId = "{{ $sessionId }}";

            // Fetch and display files
            async function fetchFiles() {
              const response = await fetch(`/get-files/${sessionId}`);
              const files = await response.json();

              const fileListContainer = document.getElementById("file-list");
              fileListContainer.innerHTML = files.map(file => `
                <div>
                  <a href="${file.file_url}" target="_blank">${file.file_name}</a>
                </div>
              `).join('');
            }

            // Handle file upload
            const fileUploadForm = document.getElementById("file-upload-form");
            fileUploadForm.addEventListener("submit", async (event) => {
              event.preventDefault();

              const formData = new FormData(fileUploadForm);
              formData.append("session_id", sessionId);

              try {
                const response = await fetch("/upload-file", {
                  method: "POST",
                  body: formData,
                });

                if (response.ok) {
                  alert("File uploaded successfully!");
                  fetchFiles(); // Refresh file list after upload
                } else {
                  const errorData = await response.json();
                  console.error("Upload failed:", errorData);
                  alert(`File upload failed: ${errorData.message}`);
                }
              } catch (error) {
                console.error("An error occurred:", error);
                alert("File upload failed due to an unexpected error.");
              }
            });

            // Handle delete all files
            document.getElementById("delete-all-btn").addEventListener("click", async () => {
              const confirmDelete = confirm("Are you sure you want to delete all files?");
              if (!confirmDelete) return;

              try {
                
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                console.log("CSRF Token:", csrfToken);  // Log the CSRF token

                const response = await fetch(`/delete-all-files/${sessionId}`, {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": csrfToken,
                    },
                  });

                const result = await response.json();
                console.log("Response Status: ", response.status); // Log status code
                if (response.ok) {
                  alert(result.message);
                  fetchFiles(); // Refresh file list after deletion
                } else {
                  console.error("Error Response:", result);
                  alert(result.message);
                }
              } catch (error) {
                console.error("An error occurred:", error);
                alert("Failed to delete files due to an unexpected error.");
              }
            });

            // Initial fetch and live updates
            fetchFiles();
            setInterval(fetchFiles, 5000); // Refresh file list every 5 seconds
          };
    </script>
  </head>
  <body>
    <!-- Jitsi Meet API -->
    <div id="jaas-container" class="py-5 my-4"></div>

    <div class="file-upload-section">
      <h3 class="upload-title">File Sharing</h3>
    
      <!-- File Upload Form -->
      <form id="file-upload-form" enctype="multipart/form-data" class="upload-form">
        @csrf <!-- Include CSRF token -->
    
        <!-- File Input Field -->
        <div class="file-input-container">
          <label for="file-input" class="file-input-label">
            <i class="fas fa-upload"></i> Choose a file
          </label>
          <input type="file" id="file-input" name="file" required class="file-input" />
          <button type="submit" class="upload-btn"><i class="fas fa-cloud-upload-alt"></i> Upload File</button>
        </div>
    
        <!-- Submit Button -->
        {{-- <button type="submit" class="upload-btn">Upload File</button> --}}
      </form>
    
      <!-- Display Uploaded Files -->
      <div id="file-list" class="file-container">
        <!-- File list will appear here -->
      </div>
      <button id="delete-all-btn" type="button" class="upload-btn" style="background-color: #d9534f; margin-top: 20px;"> <i class="fas fa-trash-alt"></i>
        Delete All Files
      </button>
    </div>

  </body>
</html>


@extends('layouts.app')
@section('content')
@endsection