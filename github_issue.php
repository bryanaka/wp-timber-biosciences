<?php
/*
Template Name: Github Issues
*/

$CLIENT_ID = "42b8b22ad3f43a109eef";
$CLIENT_SECRET = "60a659bf637f381d18f90a2eed09f5f58d7bf250";

$GITHUB_API = "api.github.com";
$AUTHORIZATION_ENDPOINT = $GITHUB_API."/authorizations/clients".$CLIENT_ID;
$ISSUE_ENDPOINT = $GITHUB_API."/repos/lblpbd/wptimber-biosciences";

function set_auth_header($ch, $json) {
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($json))
    );
}

function set_issue_header($ch, $json, $access) {
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization: token '.$access,
        'Content-Type: application/json',
        'Content-Length: ' . strlen($json))
    );
}

function post_request($ch, $request_json) {
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $request_json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    return curl_exec($ch);
}

$auth_request = array(
    "client_secret" => $CLIENT_SECRET,
    "scopes" => array("public_repo"),
    "note" => "lbl issue access",
);
$auth_json = json_encode($auth_request);

$auth_ch = curl_init($AUTHORIZATION_ENDPOINT);
set_auth_header($auth_ch, $auth_json);
$auth_response = post_request($auth_ch, $auth_json);

$access = $auth_response["token"];

$issue_request = array(
    "title" => $_POST["title"],
    "body" => $_POST["body"],
    "assignee" => $_POST["assignee"],
    "milestone" => $_POST["milestone"],
    "labels" => $_POST["labels"]
);
$issue_json = json_encode($issue_request);

$issue_ch = curl_init($ISSUE_ENDPOINT);
set_issue_header($issue_ch, $issue_json, $access);
post_request($issue_ch, $issue_json);
