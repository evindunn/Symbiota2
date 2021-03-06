---
layout: default
---

### [Back to index](./index.html)

# ComponentHook object

* * *

**Property definitions**

| Name          | Value Type  | Required | Default |
|:--------------|:------------|:---------|:--------|
| outlet        | string      | Yes      |         |
| index         | number      | No       |         |
| provider      | string      | No       |         |
| component     | any         | No       |         |

* * *

**Property descriptions**

- **outlet:** The component hook outlet within Symbiota2 that this hook should connect to.
- **index:** Numeric sort order value this component should receive when being sorted with other components in the same outlet.
- **provider:** The provider for the component (defined within the module of the plugin).
- **component:** Can only be assigned a value from within the actual outlet component (and not within the config file). 
    Used to load default components for a specific outlet.

* * *

### [Back to index](./index.html)
