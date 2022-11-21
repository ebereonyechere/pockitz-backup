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

class Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1SmartMessagingEntry extends Google_Model
{
  protected $messageInfoType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1SmartMessagingEntryInfo';
  protected $messageInfoDataType = '';
  public $name;
  public $rawText;
  public $state;

  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1SmartMessagingEntryInfo
   */
  public function setMessageInfo(Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1SmartMessagingEntryInfo $messageInfo)
  {
    $this->messageInfo = $messageInfo;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1SmartMessagingEntryInfo
   */
  public function getMessageInfo()
  {
    return $this->messageInfo;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setRawText($rawText)
  {
    $this->rawText = $rawText;
  }
  public function getRawText()
  {
    return $this->rawText;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
}
