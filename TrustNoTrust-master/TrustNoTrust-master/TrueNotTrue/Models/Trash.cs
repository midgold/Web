using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace TrueNotTrue.Models
{
    public class Trash
    {
        public int Id { get; set; }
        public int GameId { get; set; }
        public int CountCards { get; set; }
        public string ValueCards { get; set; }
    }
}