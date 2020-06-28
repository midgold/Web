using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using TrueNotTrue.Models;
using System.Web.Script.Serialization;
using SignalRMvc.Hubs;

namespace TrueNotTrue.Controllers
{
    public class HomeController : Controller
    {
        public ActionResult Index()
        {
            return View();
        }
        public ActionResult NewIndex()
        {
            return View();
        }
    }
}