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

And add the following to your Settings.yaml

```yaml
TYPO3:
  SwiftMailer:
    transport:
      type: 'Langeland\SwiftBox\Transport\SwiftBoxTransport'
````

And then visit http://server.tld/swiftbox
