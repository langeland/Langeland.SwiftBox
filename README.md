# Langeland.SwiftBox

Add the following to Configuration/Routes.yaml:

```yaml
-
  name: 'SwiftBox'
  uriPattern: 'swiftbox/<SwiftBoxSubroutes>'
  defaults:
    '@package': 'Langeland.SwiftBox'
  subRoutes:
    SwiftBoxSubroutes:
      package: 'Langeland.SwiftBox'
```

And then visit http://server.tld/swiftbox
