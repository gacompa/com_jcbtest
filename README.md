# JCB! Repositories

### What Are JCB Repositories?
JCB Repositories define where Joomla Component Builder (JCB) pushes or pulls content from  
during INIT, RESET, and PUSH operations.

They act as the Git configuration layer for managing remote syncing of the following entity types:
- 🧩 Snippets
- ⚡ Super Powers
- 🧬 Field Types
- 🔧 Joomla Powers
- 📦 JCB Packages

Each repository configuration defines how and where content is versioned - using GitHub, Gitea, or similar Git platforms.

---
### What Do Repositories Do?
A JCB Repository specifies:

- Which Git platform (e.g., GitHub or Gitea)
- Which organization/repo to use
- What branches to read from and write to
- How authentication should be handled (token, user, URL)
- Whether to use **Global Config** credentials or **Override** credentials locally
- Author name/email for Git commits

Each repository becomes a "target" used by JCB to push and pull data between your local builder and remote Git Repo.

Repositories themselves do not contain the data - they provide the link for transferring it.

---
### Access & Authentication
You can define two authentication modes:

- `Global`: Pull credentials from the global configuration of your JCB Component.
- `Override`: Manually provide your own Git credentials within this repository setup.

This provides fine-grained control for contributors, CI/CD automation, or organization-level collaboration.

Depending on the selected Git type:
- GitHub requires token, organization, and repo
- Gitea requires base URL, token, and organization

---
### Repository Targets
Each Repository can be assigned as the sync target for:

- Snippets
- Super Powers
- Field Types
- Joomla Powers
- JCB Packages

When INIT or RESET is triggered in those respective areas, JCB uses the matching repository settings to:
- Clone content from the repository into JCB
- Push updated content from JCB into Git

Multiple repositories can exist for different content types or development environments.

> Repositories define where things go — they are the communication bridge between your structured data in JCB and your remote Git Repositories.

### Index of JCB Repositories


 - **com_jcbtest** | [Details](src/302f31d8-65b3-4c0a-97c3-033176860cfc) | [Settings](src/302f31d8-65b3-4c0a-97c3-033176860cfc/item.json)

### All used in [Joomla Component Builder](https://www.joomlacomponentbuilder.com) - [Source](https://git.vdm.dev/joomla/Component-Builder) - [Mirror](https://github.com/vdm-io/Joomla-Component-Builder) - [Download](https://git.vdm.dev/joomla/pkg-component-builder/releases)

---
[![Joomla Volunteer Portal](https://img.shields.io/badge/-Joomla-gold?logo=joomla)](https://volunteers.joomla.org/joomlers/1396-llewellyn-van-der-merwe "Join Llewellyn on the Joomla Volunteer Portal: Shaping the Future Together!") [![Octoleo](https://img.shields.io/badge/-Octoleo-black?logo=linux)](https://git.vdm.dev/octoleo "--quiet") [![Llewellyn](https://img.shields.io/badge/-Llewellyn-ffffff?logo=gitea)](https://git.vdm.dev/Llewellyn "Collaborate and Innovate with Llewellyn on Git: Building a Better Code Future!") [![Telegram](https://img.shields.io/badge/-Telegram-blue?logo=telegram)](https://t.me/Joomla_component_builder "Join Llewellyn and the Community on Telegram: Building Joomla Components Together!") [![Mastodon](https://img.shields.io/badge/-Mastodon-9e9eec?logo=mastodon)](https://joomla.social/@llewellyn "Connect and Engage with Llewellyn on Joomla Social: Empowering Communities, One Post at a Time!") [![X (Twitter)](https://img.shields.io/badge/-X-black?logo=x)](https://x.com/llewellynvdm "Join the Conversation with Llewellyn on X: Where Ideas Take Flight!") [![GitHub](https://img.shields.io/badge/-GitHub-181717?logo=github)](https://github.com/Llewellynvdm "Build, Innovate, and Thrive with Llewellyn on GitHub: Turning Ideas into Impact!") [![YouTube](https://img.shields.io/badge/-YouTube-ff0000?logo=youtube)](https://www.youtube.com/@OctoYou "Explore, Learn, and Create with Llewellyn on YouTube: Your Gateway to Inspiration!") [![n8n](https://img.shields.io/badge/-n8n-black?logo=n8n)](https://n8n.io/creators/octoleo "Effortless Automation and Impactful Workflows with Llewellyn on n8n!") [![Docker Hub](https://img.shields.io/badge/-Docker-grey?logo=docker)](https://hub.docker.com/u/llewellyn "Llewellyn on Docker: Containerize Your Creativity!") [![Open Collective](https://img.shields.io/badge/-Donate-green?logo=opencollective)](https://opencollective.com/joomla-component-builder "Donate towards JCB: Help Llewellyn financially so he can continue developing this great tool!") [![GPG Key](https://img.shields.io/badge/-GPG-blue?logo=gnupg)](https://git.vdm.dev/Llewellyn/gpg "Unlock Trust and Security with Llewellyn's GPG Key: Your Gateway to Verified Connections!")