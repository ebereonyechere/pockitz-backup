<?php

require_once("home.php"); // loading home controller

class pixie_editor extends Home
{
    public $user_id;

    /**
     * load constructor
     * @access public
     * @return void
     */

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('logged_in') != 1)
            redirect('home/login_page', 'location');

        $this->load->helper('form');
        $this->load->library('upload');
        $this->load->library('google');
        $this->load->library('Web_common_report');
        $this->upload_path = realpath(APPPATH . '../upload');
        $this->user_id=$this->session->userdata('user_id');
        set_time_limit(0);




        if($this->session->userdata('user_type') != 'Admin' && !in_array(26,$this->module_access))
            redirect('home/login_page', 'location');
    }

    public function index()
    {
        $data['body'] = 'pixie_editor/index';
        $data['page_title'] = $this->lang->line('thumbnail creator');
        $this->_viewcontroller($data);
    }

    public function upload()
    {
        $data['body'] = 'pixie_editor/upload';
        $data['page_title'] = $this->lang->line('thumbnail creator');
        $this->_viewcontroller($data);
    }

    public function do_upload()
    {
        $video_id = $_POST['video_id'];

        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048000';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload');
        $this->upload->initialize($config);

        if($this->upload->do_upload('thumbnail'))
        {
            $data = array('upload_data' => $this->upload->data());
            $thumbnail = 'upload/' . $data['upload_data']['file_name'];
            $htmlBody = '';

            /**
             * This sample uploads and sets a custom thumbnail for a video.
             *
             * 1. It uploads an image using the "Google_MediaFileUpload" class.
             * 2. It sets the uploaded image as a custom thumbnail to the video by
             *    calling the API's "youtube.thumbnails.set" method
             *
             * @author Ibrahim Ulukaya
             */

            /**
             * Library Requirements
             *
             * 1. Install composer (https://getcomposer.org)
             * 2. On the command line, change to this directory (api-samples/php)
             * 3. Require the google/apiclient library
             *    $ composer require google/apiclient:~2.0
             */
            if (!file_exists(__DIR__ . '/vendor/autoload.php')) {
                throw new \Exception('please run "composer require google/apiclient:~2.0" in "' . __DIR__ .'"');
            }

            require_once __DIR__ . '/vendor/autoload.php';
            session_start();

            /*
             * You can acquire an OAuth 2.0 client ID and client secret from the
             * {{ Google Cloud Console }} <{{ https://cloud.google.com/console }}>
             * For more information about using OAuth 2.0 to access Google APIs, please see:
             * <https://developers.google.com/youtube/v3/guides/authentication>
             * Please ensure that you have enabled the YouTube Data API for your project.
             */
            $OAUTH2_CLIENT_ID = '86582484600-n68j2tjvb9lj7qhep9vkrqrt89fgkpre.apps.googleusercontent.com';
            $OAUTH2_CLIENT_SECRET = 'mNV7aQ98k7yhdPsRY1v7oNOD';

            $client = new Google_Client();
            $client->setClientId($OAUTH2_CLIENT_ID);
            $client->setClientSecret($OAUTH2_CLIENT_SECRET);
            $client->setScopes('https://www.googleapis.com/auth/youtube');
            $redirect = filter_var('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'],
                FILTER_SANITIZE_URL);
            $client->setRedirectUri($redirect);

            // Define an object that will be used to make all API requests.
            $youtube = new Google_Service_YouTube($client);

            // Check if an auth token exists for the required scopes
            $tokenSessionKey = 'token-' . $client->prepareScopes();
            if (isset($_GET['code'])) {
                if (strval($_SESSION['state']) !== strval($_GET['state'])) {
                    die('The session state did not match.');
                }

                $client->authenticate($_GET['code']);
                $_SESSION[$tokenSessionKey] = $client->getAccessToken();
                header('Location: ' . $redirect);
            }

            if (isset($_SESSION[$tokenSessionKey])) {
                $client->setAccessToken($_SESSION[$tokenSessionKey]);
            }

            // Check to ensure that the access token was successfully acquired.
            if ($client->getAccessToken()) {
                try{

                    // REPLACE this value with the video ID of the video being updated.
                    $videoId = $video_id;

                    // REPLACE this value with the path to the image file you are uploading.
                    $imagePath = base_url($thumbnail);

                    // Specify the size of each chunk of data, in bytes. Set a higher value for
                    // reliable connection as fewer chunks lead to faster uploads. Set a lower
                    // value for better recovery on less reliable connections.
                    $chunkSizeBytes = 1 * 1024 * 1024;

                    // Setting the defer flag to true tells the client to return a request which can be called
                    // with ->execute(); instead of making the API call immediately.
                    $client->setDefer(true);

                    // Create a request for the API's thumbnails.set method to upload the image and associate
                    // it with the appropriate video.
                    $setRequest = $youtube->thumbnails->set($videoId);

                    // Create a MediaFileUpload object for resumable uploads.
                    $media = new Google_Http_MediaFileUpload(
                        $client,
                        $setRequest,
                        'image/png',
                        null,
                        true,
                        $chunkSizeBytes
                    );
                    $media->setFileSize(filesize($imagePath));


                    // Read the media file and upload it chunk by chunk.
                    $status = false;
                    $handle = fopen($imagePath, "rb");
                    while (!$status && !feof($handle)) {
                        $chunk = fread($handle, $chunkSizeBytes);
                        $status = $media->nextChunk($chunk);
                    }

                    fclose($handle);

                    // If you want to make other calls after the file upload, set setDefer back to false
                    $client->setDefer(false);


                    $thumbnailUrl = $status['items'][0]['default']['url'];
                    $htmlBody .= "<h3>Thumbnail Uploaded</h3><ul>";
                    $htmlBody .= sprintf('<li>%s (%s)</li>',
                        $videoId,
                        $thumbnailUrl);
                    $htmlBody .= sprintf('<img src="%s">', $thumbnailUrl);
                    $htmlBody .= '</ul>';


                } catch (Google_Service_Exception $e) {
                    $htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',
                        htmlspecialchars($e->getMessage()));
                } catch (Google_Exception $e) {
                    $htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',
                        htmlspecialchars($e->getMessage()));
                }

                $_SESSION[$tokenSessionKey] = $client->getAccessToken();
            } elseif ($OAUTH2_CLIENT_ID == 'REPLACE_ME') {
                $htmlBody = <<<END
              <h3>Client Credentials Required</h3>
              <p>
                You need to set <code>\$OAUTH2_CLIENT_ID</code> and
                <code>\$OAUTH2_CLIENT_ID</code> before proceeding.
              <p>
END;
            } else {
                // If the user hasn't authorized the app, initiate the OAuth flow
                $state = mt_rand();
                $client->setState($state);
                $_SESSION['state'] = $state;

                $authUrl = $client->createAuthUrl();
                $htmlBody = <<<END
            <h3>Authorization Required</h3>
            <p>You need to <a href="$authUrl">authorize access</a> before proceeding.<p>
END;
            }
            echo "
                <!doctype html>
            <html>
            <head>
                <title>Claim Uploaded</title>
            </head>
            <body>
            <?=$htmlBody
          </body>
          </html>
            ";



} else {
            $error = array('error' => $this->upload->display_errors());
            $this->dd($error);
        }
    }
}
