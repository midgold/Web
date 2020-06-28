using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace TrueNotTrue.Models
{
    public class WaitModel
    {
        public int Id { get; set; }
        public bool Connecting { get; set; }
        public string PlayerOneId { get; set; }
        public string PlayerTwoId { get; set; }
    }
}