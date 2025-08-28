# LinkedIn Sign-In

Using this module, users can directly log in or register with their LinkedIn credentials at this HumHub installation. 
A new button "LinkedIn" will appear on the login page.

## Configuration

Please follow the to create the required ` OAuth client ID` credentials.

[V1](https://www.linkedin.com/help/linkedin/answer/5070/log-in-with-linkedin-credentials?lang=en)
[V2](https://learn.microsoft.com/en-us/linkedin/consumer/integrations/self-serve/sign-in-with-linkedin-v2)

Once you have the **Client ID** and **Client Secret** created there, the values must then be entered in the module configuration at: `Administration -> Modules -> LinkedIn Auth -> Settings`. 
This page also displays the `Authorized redirect URI`, which must be inserted in LinkedIn in the corresponding field. If after this signing will not work check `useV2` checkbox and try again.





