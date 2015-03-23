# Langeland.Mailbox

Add the following to Configuration/Routes.yaml:

```yaml
-
  name: 'SwiftBox'
  uriPattern: 'swiftbox/<SwiftBoxSubroutes>'
  defaults:
    '@package': 'Langeland.Mailbox'
  subRoutes:
    SwiftBoxSubroutes:
      package: 'Langeland.Mailbox'
```

And then visit http://server.tld/swiftbox
