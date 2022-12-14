<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

class Google_Service_Apigee_GoogleCloudApigeeV1ListApiCategoriesResponse extends Google_Collection
{
  protected $collection_key = 'data';
  protected $dataType = 'Google_Service_Apigee_GoogleCloudApigeeV1ApiCategoryData';
  protected $dataDataType = 'array';
  public $errorCode;
  public $message;
  public $requestId;
  public $status;

  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1ApiCategoryData
   */
  public function setData($data)
  {
    $this->data = $data;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ApiCategoryData
   */
  public function getData()
  {
    return $this->data;
  }
  public function setErrorCode($errorCode)
  {
    $this->errorCode = $errorCode;
  }
  public function getErrorCode()
  {
    return $this->errorCode;
  }
  public function setMessage($message)
  {
    $this->message = $message;
  }
  public function getMessage()
  {
    return $this->message;
  }
  public function setRequestId($requestId)
  {
    $this->requestId = $requestId;
  }
  public function getRequestId()
  {
    return $this->requestId;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
}
