<?php

$settings = array(
    // If 'strict' is True, then the PHP Toolkit will reject unsigned
    // or unencrypted messages if it expects them signed or encrypted
    // Also will reject the messages if not strictly follow the SAML
    // standard: Destination, NameId, Conditions ... are validated too.
    'strict' => true,

    // Enable debug mode (to print errors)
    'debug' => false,

    // Set a BaseURL to be used instead of try to guess
    // the BaseURL of the view that process the SAML Message.
    // Ex. http://sp.example.com/
    //     http://example.com/sp/
    'baseurl' => null,

    // Service Provider Data that we are deploying
    'sp' => array(
        // Identifier of the SP entity  (must be a URI)
        'entityId' => 'http://localhost:8000/saml2/734963b2-2cee-4425-a627-9e65d818b86c/metadata',
        // Specifies info about where and how the <AuthnResponse> message MUST be
        // returned to the requester, in this case our SP.
        'assertionConsumerService' => array(
            // URL Location where the <Response> from the IdP will be returned
            'url' => 'http://localhost:8000/saml2/734963b2-2cee-4425-a627-9e65d818b86c/acs',
            // SAML protocol binding to be used when returning the <Response>
            // message.  Onelogin Toolkit supports for this endpoint the
            // HTTP-POST binding only
            'binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
        ),
        // If you need to specify requested attributes, set a
        // attributeConsumingService. nameFormat, attributeValue and
        // friendlyName can be omitted. Otherwise remove this section.
        "attributeConsumingService"=> array(
                "serviceName" => "SP test",
                "serviceDescription" => "Test Service",
                "requestedAttributes" => array(
                    array(
                        "name" => "",
                        "isRequired" => false,
                        "nameFormat" => "",
                        "friendlyName" => "",
                        "attributeValue" => ""
                    )
                )
        ),
        // Specifies info about where and how the <Logout Response> message MUST be
        // returned to the requester, in this case our SP.
        'singleLogoutService' => array(
            // URL Location where the <Response> from the IdP will be returned
            'url' => '',
            // SAML protocol binding to be used when returning the <Response>
            // message.  Onelogin Toolkit supports for this endpoint the
            // HTTP-Redirect binding only
            'binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
        ),
        // Specifies constraints on the name identifier to be used to
        // represent the requested subject.
        // Take a look on lib/Saml2/Constants.php to see the NameIdFormat supported
        'NameIDFormat' => 'urn:oasis:names:tc:SAML:1.1:nameid-format:unspecified',

        // Usually x509cert and privateKey of the SP are provided by files placed at
        // the certs folder. But we can also provide them with the following parameters
        'x509cert' => '',
        'privateKey' => '',

        /*
         * Key rollover
         * If you plan to update the SP x509cert and privateKey
         * you can define here the new x509cert and it will be 
         * published on the SP metadata so Identity Providers can
         * read them and get ready for rollover.
         */
        // 'x509certNew' => '',
    ),

    // Identity Provider Data that we want connect with our SP
    'idp' => array(
        // Identifier of the IdP entity  (must be a URI)
        'entityId' => 'https://sts.windows.net/a25e3115-8900-45d8-ab1d-c5d691bd8c2e/',
        // SSO endpoint info of the IdP. (Authentication Request protocol)
        'singleSignOnService' => array(
            // URL Target of the IdP where the SP will send the Authentication Request Message
            'url' => 'https://login.microsoftonline.com/a25e3115-8900-45d8-ab1d-c5d691bd8c2e/saml2',
            // SAML protocol binding to be used when returning the <Response>
            // message.  Onelogin Toolkit supports for this endpoint the
            // HTTP-Redirect binding only
            'binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
        ),
        // SLO endpoint info of the IdP.
        'singleLogoutService' => array(
            // URL Location of the IdP where the SP will send the SLO Request
            'url' => 'https://login.microsoftonline.com/a25e3115-8900-45d8-ab1d-c5d691bd8c2e/saml2 ',
            // URL location of the IdP where the SP SLO Response will be sent (ResponseLocation)
            // if not set, url for the SLO Request will be used
            'responseUrl' => 'MIIC8DCCAdigAwIBAgIQQjG8NKLsEoxBUsrSZ4FQ+zANBgkqhkiG9w0BAQsFADA0MTIwMAYDVQQD
	EylNaWNyb3NvZnQgQXp1cmUgRmVkZXJhdGVkIFNTTyBDZXJ0aWZpY2F0ZTAeFw0yNDEwMTAxMDMy
	MzhaFw0yNzEwMTAxMDMyMzdaMDQxMjAwBgNVBAMTKU1pY3Jvc29mdCBBenVyZSBGZWRlcmF0ZWQg
	U1NPIENlcnRpZmljYXRlMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAy9xSmLrSPQ1m
	ncrl6OXjSW2LXbQkRD9ANqUr3ai6tzY2c/raarWk030tRwYJJedJhj0Lak5eESG3VIA49lBioQfa
	9G47eFxSj6Ftp/EMVAZms2SZQCdeY0Y3KEQCp3rFPdGadd0EAZYBFE1eT7PO/YQuWTVdOLW9NtSC
	TZUqfQHxX3+465ViPMOT0zdXr/Thc0Y4Xx5Y9BDuFoCOcwLpfWayLOvLYoB7O4c/Xrxa3rDTxOMQ
	+B3n8VExY7pFgbwnIkPpoX2jAzLMCMHCFzqtSx0M7uCoIxjwbYU7UiBvXm1KiRj9jnP4nJJOAc8W
	dC4PY0+l+n/Ff0w4H3b3BZ9QSQIDAQABMA0GCSqGSIb3DQEBCwUAA4IBAQC1qNvPhDrYt9CxsGZ5
	lHZVy3XYVjbo8CXk/tiVKLlevqrUXaXXlHN4/O+oKRAI6X+PFCbdxuaDqtI/70eJH5b06M7ObIxs
	dLPkouR2MrMR+L1lYE3tXgzcfS6L+ORPITMuJhbv+A0PjJYbS0zGPUP+se/hFy6HmbCu8NsvFWNE
	JVx5zJ0mizDWzgaJvWQI//7aVW7cBXu0nNaHOCrUOtzxxjiQfo2mqJndD8wF3VYBSsRRmjmvxPWw
	SQlPFv9Qj012esCMepTXauI6S45eRG0oho0r1pPKlYmaMUAjl7EudJiEfu65698ZykCP8H5oeiY6
	KRWionjOrH2yXaJAsV67',
            // SAML protocol binding to be used when returning the <Response>
            // message.  Onelogin Toolkit supports for this endpoint the
            // HTTP-Redirect binding only
            'binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
        ),
        // Public x509 certificate of the IdP
        'x509cert' => '',
        /*
         *  Instead of use the whole x509cert you can use a fingerprint in
         *  order to validate the SAMLResponse, but we don't recommend to use
         *  that method on production since is exploitable by a collision
         *  attack.
         *  (openssl x509 -noout -fingerprint -in "idp.crt" to generate it,
         *   or add for example the -sha256 , -sha384 or -sha512 parameter)
         *
         *  If a fingerprint is provided, then the certFingerprintAlgorithm is required in order to
         *  let the toolkit know which Algorithm was used. Possible values: sha1, sha256, sha384 or sha512
         *  'sha1' is the default value.
         */
        // 'certFingerprint' => '',
        // 'certFingerprintAlgorithm' => 'sha1',

        /* In some scenarios the IdP uses different certificates for
         * signing/encryption, or is under key rollover phase and more 
         * than one certificate is published on IdP metadata.
         * In order to handle that the toolkit offers that parameter.
         * (when used, 'x509cert' and 'certFingerprint' values are
         * ignored).
         */
        // 'x509certMulti' => array(
        //      'signing' => array(
        //          0 => '<cert1-string>',
        //      ),
        //      'encryption' => array(
        //          0 => '<cert2-string>',
        //      )
        // ),
    ),
);
